<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    // Functie om een auto aan te bieden
    public function offerCar(Request $request)
    {
        // Valideer de invoer van het formulier
        $validatedData = $request->validate([
            'license_plate' => 'required|string',
            'make' => 'required|string',
            'model' => 'required|string',
            'price' => 'required|numeric',
            'mileage' => 'required|integer',
            // Voeg andere validatieregels toe voor andere velden
        ]);

        // Voeg de auto toe aan de database
        $car = new Car($validatedData);
        $car->user_id = auth()->user()->id; // Gebruik de ingelogde gebruiker als aanbieder
        $car->save();

        // Voeg tags toe aan de auto indien geselecteerd
        if ($request->has('tags')) {
            $tags = explode(',', $request->input('tags'));
            $tagIds = Tag::whereIn('name', $tags)->pluck('id');
            $car->tags()->sync($tagIds);
        }

        // Keer terug naar het dashboard of een andere gewenste locatie
        return redirect()->route('dashboard')->with('success', 'Auto succesvol aangeboden!');
    }

    // Functie om een overzicht van aangeboden auto's te tonen
    public function showOfferedCars()
    {
        $cars = Car::with('tags')->get(); // Haal auto's op met bijbehorende tags
        return view('cars.offered-cars', compact('cars'));
    }

    // Functie om een aangeboden auto te verwijderen
    public function deleteOfferedCar($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        // Keer terug naar het overzicht van aangeboden auto's
        return redirect()->route('offered-cars')->with('success', 'Auto succesvol verwijderd!');
    }

}

