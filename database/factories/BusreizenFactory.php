<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Busreizen>
 */
class BusreizenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
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

        $departureCity = $this->faker->randomElement($dutchCitiesAndTowns);

        $departureDate = $this->faker->dateTimeBetween('-1 week', '+1 week');
        $arrivalDate = $this->faker->dateTimeBetween($departureDate, $departureDate->format('Y-m-d H:i:s').' +2 days');
        $festival_id = \App\Models\Festival::inRandomOrder()->first()->id;
        return [
            'departure' => $departureCity,
            'festival_id' => $festival_id,
            'arrival' => \App\Models\Festival::find($festival_id)->location,
            'departure_date' => $departureDate,
            'arrival_date' => $arrivalDate,
            'departure_time' => $departureDate->format('H:i:s'),
            'arrival_time' => $arrivalDate->format('H:i:s'),
        ];
    }
    //\App\Models\Busreizen::factory()->count(100)->create();
}
