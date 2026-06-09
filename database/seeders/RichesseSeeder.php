<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Richesse;

class RichesseSeeder extends Seeder
{
    public function run(): void
    {
        // Kadiogo
        $region = Region::where('slug', 'kadiogo')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Administration',
                'icon'      => '🏛️',
                'items'     => json_encode(["Sièges ministériels", "Institutions publiques", "Ambassades", "ONG internationales"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Commerce',
                'icon'      => '🏪',
                'items'     => json_encode(["Grand marché (Rood Woko)", "Zones industrielles", "Centres commerciaux", "Startups tech"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Culture',
                'icon'      => '🎭',
                'items'     => json_encode(["FESPACO", "SIAO", "Les Récréâtrales", "CENASA"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Éducation',
                'icon'      => '🎓',
                'items'     => json_encode(["Université Joseph Ki-Zerbo", "Instituts de recherche (CNRST)", "Écoles supérieures"]),
            ]);
        }

        // Nando
        $region = Region::where('slug', 'nando')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Agriculture',
                'icon'      => '🌾',
                'items'     => json_encode(["Maïs", "Sorgho", "Coton", "Arachide", "Anacarde"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Élevage',
                'icon'      => '🐄',
                'items'     => json_encode(["Bovins", "Ovins", "Volaille locale"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Artisanat',
                'icon'      => '🎨',
                'items'     => json_encode(["Tissage traditionnel", "Poterie de potières de Réo", "Vannerie"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Culture',
                'icon'      => '🎭',
                'items'     => json_encode(["Masques sacrés", "Théâtre de rue", "Savoirs endogènes"]),
            ]);
        }

        // Nazinon
        $region = Region::where('slug', 'nazinon')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Agriculture',
                'icon'      => '🌾',
                'items'     => json_encode(["Maïs", "Sorgho", "Niébé", "Arachide", "Maraîchage"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Élevage',
                'icon'      => '🐄',
                'items'     => json_encode(["Bovins", "Caprins", "Volaille locale de Manga"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Tourisme',
                'icon'      => '🗿',
                'items'     => json_encode(["Patrimoine de Tiébélé", "Écotourisme de Nazinga", "Chapeau de Saponé"]),
            ]);
        }

        // Nakambé
        $region = Region::where('slug', 'nakambe')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Agriculture',
                'icon'      => '🌾',
                'items'     => json_encode(["Riz de Bagré", "Maïs", "Sorgho", "Arachide", "Maraîchage"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Commerce',
                'icon'      => '🏪',
                'items'     => json_encode(["Transit frontalier de Bittou", "Marché de Pouytenga", "Échanges régionaux"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Élevage',
                'icon'      => '🐄',
                'items'     => json_encode(["Bovins", "Ovins", "Production laitière"]),
            ]);
        }

        // Kuilsé
        $region = Region::where('slug', 'kuilse')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Mines',
                'icon'      => '⛏️',
                'items'     => json_encode(["Or industriel", "Orpaillage artisanal"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Élevage',
                'icon'      => '🐄',
                'items'     => json_encode(["Bovins", "Ovins (Mouton de Kaya)", "Caprins"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Artisanat',
                'icon'      => '👞',
                'items'     => json_encode(["Cuir et maroquinerie de Kaya", "Poterie", "Tissage"]),
            ]);
        }

        // Yaadga
        $region = Region::where('slug', 'yaadga')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Agriculture',
                'icon'      => '🌾',
                'items'     => json_encode(["Sésame", "Niébé", "Mil", "Sorgho", "Maraîchage de contre-saison"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Élevage',
                'icon'      => '🐄',
                'items'     => json_encode(["Bovins", "Ovins", "Caprins", "Volaille locale"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Mines',
                'icon'      => '⛏️',
                'items'     => json_encode(["Orpaillage artisanal", "Gisements industriels"]),
            ]);
        }

        // Liptako
        $region = Region::where('slug', 'liptako')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Élevage',
                'icon'      => '🐪',
                'items'     => json_encode(["Dromadaires", "Bovins de race sahélienne", "Ovins (Moutons du Sahel)", "Caprins"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Mines',
                'icon'      => '⛏️',
                'items'     => json_encode(["Or industriel (Essakane)", "Manganèse de Tambao", "Orpaillage artisanal"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Artisanat',
                'icon'      => '🎨',
                'items'     => json_encode(["Bijouterie en argent", "Cuir repoussé de Dori", "Vannerie en paille sauvage"]),
            ]);
        }

        // Sirba
        $region = Region::where('slug', 'sirba')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Élevage',
                'icon'      => '🐄',
                'items'     => json_encode(["Bovins", "Ovins (Moutons)", "Caprins", "Commerce de bétail sur pied"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Agriculture',
                'icon'      => '🌾',
                'items'     => json_encode(["Sorgho", "Mil", "Arachide", "Cultures maraîchères de contre-saison"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Artisanat',
                'icon'      => '🧺',
                'items'     => json_encode(["Vannerie fine", "Travail du cuir brut", "Poterie utilitaire"]),
            ]);
        }

        // Tapoa
        $region = Region::where('slug', 'tapoa')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Écotourisme',
                'icon'      => '🐘',
                'items'     => json_encode(["Safaris visionnaires", "Photos animalières", "Aires de conservation protégées"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Agriculture',
                'icon'      => '🌾',
                'items'     => json_encode(["Coton", "Maïs", "Anacarde (Noix de cajou)", "Sésame"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Élevage',
                'icon'      => '🐄',
                'items'     => json_encode(["Bovins", "Ovins", "Produits laitiers pastoraux"]),
            ]);
        }

        // Oubri
        $region = Region::where('slug', 'oubri')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Artisanat d\'art',
                'icon'      => '🗿',
                'items'     => json_encode(["Sculpture sur pierre de Laongo", "Poterie de Ziniaré", "Tissage"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Agriculture',
                'icon'      => '🌾',
                'items'     => json_encode(["Sorgo", "Mil", "Niébé", "Cultures maraîchères de Loumbila"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Élevage',
                'icon'      => '🐄',
                'items'     => json_encode(["Bovins", "Ovins", "Aviculture moderne"]),
            ]);
        }

        // Goulmou
        $region = Region::where('slug', 'goulmou')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Énergie',
                'icon'      => '⚡',
                'items'     => json_encode(["Centrale hydroélectrique", "Production piscicole de Kompienga"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Agriculture',
                'icon'      => '🌾',
                'items'     => json_encode(["Coton", "Anacarde (Noix de cajou)", "Maïs", "Sorgho"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Élevage',
                'icon'      => '🐄',
                'items'     => json_encode(["Bovins", "Ovins", "Commerce de bétail"]),
            ]);
        }

        // Bankui
        $region = Region::where('slug', 'bankui')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Agriculture',
                'icon'      => '🌾',
                'items'     => json_encode(["Coton (Or blanc)", "Maïs", "Sorgho", "Riz pluvial"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Mines',
                'icon'      => '⛏️',
                'items'     => json_encode(["Or industriel (Mine de Houndé/frontière)", "Orpaillage artisanal à Poura"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Écotourisme',
                'icon'      => '🐘',
                'items'     => json_encode(["Vision d'éléphants à Boromo", "Safaris guidés", "Biodiversité du Mouhoun"]),
            ]);
        }

        // Sourou
        $region = Region::where('slug', 'sourou')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Agriculture',
                'icon'      => '🌾',
                'items'     => json_encode(["Riz blanc du Sourou", "Oignons de Tougan", "Sésame", "Maïs"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Pêche',
                'icon'      => '🐟',
                'items'     => json_encode(["Pêche fluviale intensive", "Pisciculture villageoise"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Sport',
                'icon'      => '🤼',
                'items'     => json_encode(["Lutte traditionnelle samo", "Centres de formation"]),
            ]);
        }

        // Guiriko
        $region = Region::where('slug', 'guiriko')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Agriculture & Arboriculture',
                'icon'      => '🍏',
                'items'     => json_encode(["Mangues d'Orodara", "Coton", "Maïs", "Anacarde (Noix de cajou)"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Industrie & Commerce',
                'icon'      => '🏭',
                'items'     => json_encode(["Agro-alimentaire", "Textile", "Zone industrielle", "Transit ferroviaire"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Mines',
                'icon'      => '⛏️',
                'items'     => json_encode(["Or industriel (Houndé)", "Orpaillage artisanal"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Culture',
                'icon'      => '🎵',
                'items'     => json_encode(["Semaine Nationale de la Culture (SNC)", "Musique traditionnelle (Balafon)", "Artisanat d'art"]),
            ]);
        }

        // Tannounyan
        $region = Region::where('slug', 'tannounyan')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Agro-industrie',
                'icon'      => '🏭',
                'items'     => json_encode(["Canne à sucre (SOSUCO)", "Distillerie", "Conditionnement de mangues"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Agriculture',
                'icon'      => '🍏',
                'items'     => json_encode(["Mangues de Banfora", "Anacarde (Noix de cajou)", "Riz de plaine (Niangoloko)", "Maïs"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Écotourisme',
                'icon'      => '🏞️',
                'items'     => json_encode(["Circuits géologiques", "Safaris visionnaires", "Tourisme vert"]),
            ]);
        }

        // Djôrô
        $region = Region::where('slug', 'djoro')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Agriculture',
                'icon'      => '🌾',
                'items'     => json_encode(["Maïs", "Sorgho", "Igname de Diébougou", "Anacarde (Noix de cajou)"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Mines',
                'icon'      => '⛏️',
                'items'     => json_encode(["Orpaillage artisanal historique", "Ressources aurifères"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Tourisme',
                'icon'      => '🗿',
                'items'     => json_encode(["Patrimoine mondial de Loropéni", "Tourisme culturel", "Artisanat d'art"]),
            ]);
        }

        // Soum
        $region = Region::where('slug', 'soum')->first();
        if ($region) {
            $region->richesses()->create([
                'categorie' => 'Élevage',
                'icon'      => '🐪',
                'items'     => json_encode(["Bovins de race sahélienne", "Ovins (Moutons du Sahel)", "Caprins", "Dromadaires"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Commerce',
                'icon'      => '🏪',
                'items'     => json_encode(["Exportation de bétail sur pied", "Produits laitiers", "Cuirs et peaux"]),
            ]);
            $region->richesses()->create([
                'categorie' => 'Artisanat',
                'icon'      => '👞',
                'items'     => json_encode(["Maroquinerie pastorale", "Tissage de nattes"]),
            ]);
        }

    }
}