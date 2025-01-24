<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Festival;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Festival>
 */
class FestivalFactory extends Factory
{
    protected $model = Festival::class;

    public function definition(): array
    {
        // Lijst van Nederlandse steden en dorpen
        $dutchCitiesAndTowns = [
            "Amsterdam", "Rotterdam", "Den Haag", "Utrecht", "Eindhoven", "Tilburg", "Groningen", "Almere", "Breda", "Nijmegen",
            "Haarlem", "Zaanstad", "Arnhem", "Amersfoort", "Dordrecht", "Leiden", "Maastricht", "Zwolle", "Zoetermeer", "Leeuwarden",
            "Hengelo", "Deventer", "Sittard-Geleen", "Venlo", "Heerlen", "Alkmaar", "Hilversum", "Roosendaal", "Spijkenisse", "Pijnacker-Nootdorp",
            "Purmerend", "Schiedam", "Rijswijk", "Gouda", "Veenendaal", "IJmuiden", "Assen", "Delft", "Oss", "Culemborg",
            "Weert", "Schaijk", "Middelburg", "Wageningen", "Tiel", "Nieuwegein", "Houten", "Harderwijk", "Bunnik", "Zaltbommel",
            "Bovenkarspel", "Beilen", "Barendrecht", "Lelystad", "Uden", "Roermond", "Zwijndrecht", "Berkel en Rodenrijs", "Capelle aan den IJssel", "Vlaardingen",
            "Wormerveer", "Hoofddorp", "Amstelveen", "Emmen", "Raalte", "Oosterhout", "Gorinchem", "Hengelo", "Valkenswaard", "Zeist",
            "Borsele", "Vught", "Waddinxveen", "Verenigde Staten", "Haarlemmermeer", "Hoorn", "Dronten", "Doetinchem", "Borne", "Terneuzen",
            "Alphen aan den Rijn", "Leidschendam-Voorburg", "Zaanstad", "Dongen", "Roden", "Oldenzaal", "Nieuw-Vennep", "Sittard", "Loon op Zand", "Sliedrecht",
            "Wijchen", "Gorinchem", "Ede", "Hoorn", "Tiel", "Limburg", "Hengelo", "Haarlem", "Valkenburg", "Hendrik-Ido-Ambacht",
            "Nijkerk", "Kampen", "Lisse", "Helmond", "Westland", "Oostzaan", "Bovenkarspel", "Hoogezand-Sappemeer", "Hilversum", "Tegelen",
            "Schijndel", "Goes", "Assen", "Wervershoof", "Bunschoten-Spakenburg", "Purmerend", "Gouda", "Nieuwegein", "Veenendaal", "Harderwijk",
            "Schoonhoven", "Katwilk", "Veendam", "Vlaardingen", "IJsselstein", "Zeewolde", "Vuren", "Haarlemmerliede", "Bodegraven", "Delft",
            "Woerden", "Barneveld", "Waddinxveen", "Nijmegen", "Utrecht", "Hengelo", "Hilversum", "Assen", "Groningen", "Zwolle",
            "Gouda", "Dordrecht", "Breda", "Almere", "Arnhem", "Leiden", "Leeuwarden", "Maastricht", "Venlo", "Rotterdam"
        ];

        $locationCity = $this->faker->randomElement($dutchCitiesAndTowns);

        return [
            'name' => fake()->unique()->words(3, true) . ' Festival',
            'location' => $locationCity,
            'date' => fake()->dateTimeBetween('+1 week', '+1 year'),
            'description' => fake()->paragraph(75),
            'image' => 'festival_pictures/festival.png',
            'price' => fake()->randomFloat(2, 0, 500), // Prices between 0 (free) and 500
            'tickets' => fake()->numberBetween(50, 1000), // Ticket count between 50 and 1000
            'status' => 'active',
        ];
    }
    //\App\Models\Festival::factory()->count(15)->create();
}
