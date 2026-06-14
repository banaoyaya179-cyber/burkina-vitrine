<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Gastronomie;

class GastronomieSeeder extends Seeder
{
    public function run(): void
    {
        // Kadiogo
        $region = Region::where('slug', 'kadiogo')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Riz gras',
                'description' => 'Riz cuit dans une sauce tomate épicée avec de la viande ou du poisson',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/riz-gras.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Poulet bicyclette',
                'description' => 'Poulet local braisé, grillé ou sauté, spécialité incontournable des maquis',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/poulet.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Tô',
                'description' => 'Pâte de mil, de sorgho ou de maïs servie avec des sauces traditionnelles',
                'type'        => 'Accompagnement',
                'image'       => 'images/gastronomie/to.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Bissap',
                'description' => 'Boisson rafraîchissante à base d\'infusion de fleurs d\'hibiscus',
                'type'        => 'Boisson',
                'image'       => 'images/gastronomie/bissap.jpg',
            ]);
        }

        // Nando
        $region = Region::where('slug', 'nando')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Tô de mil',
                'description' => 'Pâte traditionnelle à base de farine de mil, servie avec la sauce gombo locale',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/to-mil.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Babenda',
                'description' => 'Mets traditionnel d\'unification fait de feuilles vertes (brèdes) cuites avec des arachides et du riz',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/babenda.jpg',
            ]);
        }

        // Nazinon
        $region = Region::where('slug', 'nazinon')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Massa de Manga',
                'description' => 'Petites galettes de mil ou de riz, frites, légèrement sucrées et croustillantes, spécialité du chef-lieu',
                'type'        => 'Goûter / Accompagnement',
                'image'       => 'images/gastronomie/massa.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Babenda',
                'description' => 'Mets de feuilles locales cuites avec du riz et des arachides pilées',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/babenda.jpg',
            ]);
        }

        // Nakambé
        $region = Region::where('slug', 'nakambe')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Sauce Bissa (Zambré)',
                'description' => 'Sauce traditionnelle préparée à base de graines de kénaf fermentées, accompagnant superbement le tô',
                'type'        => 'Accompagnement',
                'image'       => 'images/gastronomie/sauce-bissa.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Goni',
                'description' => 'Mets traditionnel Bissa savoureux à base de farine de haricot niébé cuit à la vapeur',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/goni.jpg',
            ]);
        }

        // Kuilsé
        $region = Region::where('slug', 'kuilse')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Brochettes de Kaya (Koura-koura)',
                'description' => 'Célèbres brochettes de viande de mouton saupoudrées de galettes d\'arachide pilées et d\'épices',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/brochettes-kaya.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Tô de sorgho',
                'description' => 'Pâte traditionnelle accompagnée d\'une sauce de feuilles locales ou de gombo',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/to.jpg',
            ]);
        }

        // Yaadga
        $region = Region::where('slug', 'yaadga')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Sauce Gombo (Koubvando)',
                'description' => 'Sauce gluante à base de gombo frais ou séché, accompagnant traditionnellement le tô de mil',
                'type'        => 'Accompagnement',
                'image'       => 'images/gastronomie/gombo.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Pain de singe (Bouye)',
                'description' => 'Boisson locale naturelle extraite de la pulpe des fruits du baobab',
                'type'        => 'Boisson',
                'image'       => 'images/gastronomie/bouye.jpg',
            ]);
        }

        // Liptako
        $region = Region::where('slug', 'liptako')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Choukouya',
                'description' => 'Viande de mouton ou de bœuf subtilement assaisonnée, braisée ou séchée selon les techniques nomades',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/choukouya.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Lait caillé au petit mil',
                'description' => 'Aliment de base traditionnel, boisson nutritive hautement symbolique de l\'hospitalité sahélienne',
                'type'        => 'Boisson',
                'image'       => 'images/gastronomie/lait-mil.jpg',
            ]);
        }

        // Sirba
        $region = Region::where('slug', 'sirba')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Tô de mil à la sauce baobab',
                'description' => 'Pâte de mil traditionnelle accompagnée d\'une sauce gluante riche à base de feuilles de baobab séchées',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/to-baobab.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Lait caillé frais',
                'description' => 'Boisson laitière pastorale pure, symbole d\'accueil et d\'hospitalité',
                'type'        => 'Boisson',
                'image'       => 'images/gastronomie/lait-caille.jpg',
            ]);
        }

        // Tapoa
        $region = Region::where('slug', 'tapoa')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Tô de mil sauce Baobab',
                'description' => 'Pâte traditionnelle à base de farine de mil accompagnée d\'une sauce gluante de feuilles de baobab séchées',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/to-baobab.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Bouillie de mil au lait (Fura)',
                'description' => 'Préparation pastorale à base de boules de mil écrasées et mélangées à du lait frais de vache',
                'type'        => 'Boisson / Dessert',
                'image'       => 'images/gastronomie/fura-lait.jpg',
            ]);
        }

        // Oubri
        $region = Region::where('slug', 'oubri')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Babenda',
                'description' => 'Mets traditionnel d\'unification fait de feuilles vertes hachées cuites avec du riz et de la pâte d\'arachide',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/babenda.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Tô de maïs sauce gombo',
                'description' => 'Pâte de maïs locale accompagnée d\'une sauce gluante aux épices traditionnelles',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/to.jpg',
            ]);
        }

        // Goulmou
        $region = Region::where('slug', 'goulmou')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Tô de mil sauce Baobab',
                'description' => 'Pâte traditionnelle à base de farine de mil servie avec une sauce gluante savoureuse de feuilles de baobab séchées',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/to-baobab.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Massa de Fada',
                'description' => 'Galettes de riz locales frites, légères et croustillantes, très populaires sur les marchés',
                'type'        => 'Accompagnement',
                'image'       => 'images/gastronomie/massa.jpg',
            ]);
        }

        // Bankui
        $region = Region::where('slug', 'bankui')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Poisson du Mouhoun au piment',
                'description' => 'Carpes ou silures fraîchement pêchés dans le fleuve, braisés ou frits avec des épices locales et du piment sauvage',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/poisson-mouhoun.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Tô de petit mil sauce gombo',
                'description' => 'Pâte traditionnelle à base de farine de mil cultivé localement, accompagnée d\'une sauce gluante de gombo frais',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/to-mil.jpg',
            ]);
        }

        // Sourou
        $region = Region::where('slug', 'sourou')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Riz au gras de la Vallée',
                'description' => 'Riz local du Sourou mijoté dans une sauce tomate grasse avec du poisson frais du fleuve',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/riz-gras-sourou.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Dolo de Toma',
                'description' => 'Bière de sorgho traditionnelle rouge, extrêmement réputée pour sa qualité et sa place centrale dans la sociabilité locale',
                'type'        => 'Boisson',
                'image'       => 'images/gastronomie/dolo.jpg',
            ]);
        }

        // Guiriko
        $region = Region::where('slug', 'guiriko')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Poulet braisé à l\'ail de Sya',
                'description' => 'Poulet local mariné aux épices locales et braisé à la braise, incontournable des maquis de Bobo',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/poulet-bobo.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Attiéké au poisson capitaine',
                'description' => 'Semoule de manioc cuite à la vapeur, servie avec du poisson frais frit, des oignons et du piment sauvage',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/attieke.jpg',
            ]);
        }

        // Tannounyan
        $region = Region::where('slug', 'tannounyan')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Sucre local et jus de mangue',
                'description' => 'Jus naturels purs de mangues de Banfora pressées, rafraîchissants et sucrés au sucre roux local',
                'type'        => 'Boisson',
                'image'       => 'images/gastronomie/jus-mangue.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Attiéké au poisson capitaine braisé',
                'description' => 'Semoule de manioc locale servie avec des tranches de capitaine braisé et des légumes frais',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/attieke.jpg',
            ]);
        }

        // Djôrô
        $region = Region::where('slug', 'djoro')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Tô de sorgho rouge sauce dolo',
                'description' => 'Pâte traditionnelle de sorgho accompagnée d\'une sauce de feuilles locales, traditionnellement servie avec le dolo local',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/to-lobi.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Tubercules d\'igname braisés',
                'description' => 'Ignames fraîches de la Bougouriba coupées en tranches et rôties à la braise',
                'type'        => 'Accompagnement',
                'image'       => 'images/gastronomie/igname.jpg',
            ]);
        }

        // Soum
        $region = Region::where('slug', 'soum')->first();
        if ($region) {
            $region->gastronomie()->create([
                'nom'         => 'Kossam (Lait caillé de chèvre ou vache)',
                'description' => 'Lait fermenté riche et onctueux, boisson d\'honneur indispensable lors de l\'accueil d\'un visiteur',
                'type'        => 'Boisson',
                'image'       => 'images/gastronomie/kossam.jpg',
            ]);
            $region->gastronomie()->create([
                'nom'         => 'Choukouya de Djibo',
                'description' => 'Viande de mouton assaisonnée d\'épices du désert et braisée à l\'étouffée selon des techniques pastorales',
                'type'        => 'Plat principal',
                'image'       => 'images/gastronomie/choukouya.jpg',
            ]);
        }

    }
}