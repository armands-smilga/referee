<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Auth users

class GameSchedulerController extends Controller
{
    /**
     * Index method Retrieves game schedules for authenticated user, using game model, the game schedules by game date in ascening order
     * and passes them to the game-scheduler.index view
     * */

    public function index()
    {
        $games = Game::where('user_id', Auth::id()) -> orderBy('game_date', 'asc') -> get();
        return view('game-scheduler.index',compact('games'));
    }

    /**
     *  Create view forum
     * */
    public function create()
    {
        return view('game-scheduler.create');
    }

    /**
     * Store function handles sumbmission of the game schedule creation form
     * first validates the data passed through
     * if validation passed, associate the game schedule with currently authenticated user by adding user_id to validated data
     * then creates new record in the games table using create funcftion in the Game model then redirects to game-scheduler.index with success msg
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'game_date' => 'required | date',
            'league' => 'required | string| max:255',
            'start_time' => 'required | date_format:H:i', // hours and minutes
            'number_of_games' => 'required | integer| min:1',
        ]);
        $validated['user_id'] = Auth::id(); // Assigns user_id to $validated array

        Game::create($validated);
        return redirect() -> route('game-scheduler.index') -> with('success', 'Game has been scheduled.');
    }


    /**
     * Delete function handles the deletion of game schedule
     * uses findOrFail method of Game model to find game with given id
     * after the function it will return to game-scheduler.index with a success message if the game was found and deleted
     */
    public function destroy($id)
    {
        $game = Game::findOrFail($id);
        $game -> delete();
        return redirect() -> route('game-scheduler.index') -> with('success', 'Game has been deleted.');
    }
}