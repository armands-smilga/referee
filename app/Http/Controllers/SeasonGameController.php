<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeasonGame;
use Illuminate\Support\Facades\Auth;

class SeasonGameController extends Controller
{
    /** 
    *index method displays the list of season games along with chart data for the authenticated user. It retrieves the user's ID using Auth::id() and queries the SeasonGame model to get the total number of games for each league.
    * The chart data is then formatted and returned to the view along with the list of season games.
    */
    public function index()
    {
        $userId = Auth::id();
        $gamesData = SeasonGame::where('user_id',$userId)
                            ->selectRaw('league,SUM(amount_of_games) as total_games')
                            ->groupBy('league')
                            ->pluck('total_games','league');
        $chartData = [
            'labels' => $gamesData -> keys() -> toArray(),
            'datasets' =>[
                [
                    'data' => $gamesData -> values() -> toArray(),
                    'backgroundColor' => [
                        '#8B0000','#FFA500','#FFD700','#00FF00','#00FFFF','#000000','#2F4F4F','#98FB98','#483D8B','#FF7F50'],
                ]
            ]
        ];
        $seasonGames = SeasonGame::where('user_id',$userId ) -> get ();
        return view('season-games.index',compact('chartData','seasonGames'));
    }
    // show form create form
    public function create()
    {
        return view('season-games.create');
    }

    /** 
    *Store method stores the newly created season game in the database. It first validates the data submitted by the user form validation.
    * If the validation is success, the validated data is combined with the authenticated user's ID and used to create a new SeasonGame object.
    *The user is then redirected to the indx page with a success msg.
    */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            'date' => 'required|date',
            'amount_of_games' => 'required|integer',
            'league' => 'required|string'
        ]);
        SeasonGame::create ($validated +['user_id' => Auth::id()]); // combine validated data with userid then create object SeasonGame with combined data
        return redirect() -> route('season-games.index') -> with('success', 'Season game added.');
    }
    // show the form for editing the specified season game and check for user id 
    public function edit(SeasonGame $seasonGame)
    {
        if ($seasonGame -> user_id !== auth()->id()){
            abort( 403,' Unauthorized action');
        }
        return view ('season-games.edit',compact('seasonGame'));
    }
    /** 
    *update method is responsible for updating a specific season game.
    *first validates the data submitted from user using form validation if validation passes, user is authorized to update the season game,
    * the validated data is used to update the season game object. 
    *The user is then redirected to the index page with a success message.
    */
    public function update(Request $request, SeasonGame $seasonGame)
    {
        $validated = $request -> validate([
            'date' => 'required|date',
            'amount_of_games' => 'required|integer',
            'league' => 'required|string'

        ]);
        if ($seasonGame -> user_id !== auth() -> id()) {
            abort(403,' Unauthorized action');
        }
        $seasonGame -> update($validated);
        return redirect() -> route('season-games.index')->with('success', 'Season game updated.');
    }
    // Remove the specified season game from storage.
    public function destroy(SeasonGame $seasonGame)
    {
        // Verifying user is authorized to delete this entry  and delete proccess happens through its id
        if ($seasonGame -> user_id !== auth()->id()) {
            abort(403,' Unauthorized action');
        }
        $seasonGame -> delete();
        return redirect() -> route('season-games.index')->with('success', 'Season game deleted.');
    }
}