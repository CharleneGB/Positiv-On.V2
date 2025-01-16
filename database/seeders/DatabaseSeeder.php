<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            ['type'=> 'Motivation', 'image'=> null],
            ['type'=> 'Echec et Difficulté', 'image'=> null],
            ['type'=> 'Vie', 'image'=>null],
            ['type'=> 'Développement Personnel', 'image'=>null],
            ['type'=> 'Travail et Action', 'image'=>null],
            ['type'=> 'Inspirantes', 'image'=>null],
            ['type'=> 'Bonheur', 'image'=>null],
            ['type'=> 'Pensées Positives', 'image'=>null],
            ['type'=> 'Esprit Positif', 'image'=>null],
            
        ];

        DB::table('categories')->insert($categories);

        $quotations = [
            ['content'=> 'Il n’y a qu’une chose qui puisse rendre un rêve impossible, c’est la peur d’échouer.', 'author'=>'Paulo Coelho', 'category_id'=>1],
            ['content'=> 'Ceux qui abandonnent ne gagnent jamais, ceux qui gagnent n’abandonnent jamais.', 'author'=>'Napoleon Hill', 'category_id'=>1],
            ['content'=> 'Dans 20 ans, vous serez plus déçu par les choses que vous n’avez pas faites que par celles que vous avez faites. Alors sortez des sentiers battus. Mettez les voiles. Explorez. Rêvez. Découvrez.', 'author'=>'Mark Twain', 'category_id'=>1],
            ['content'=> 'L’échec est seulement l’opportunité de recommencer d’une façon plus intelligente.', 'author'=>'Henry Ford', 'category_id'=>2],
            ['content'=> 'Vous n’avez rien à craindre car l’échec est impossible. Vous ne pouvez qu’apprendre, évoluer et devenir meilleur que vous ne l’avez jamais été.', 'author'=>'Hal Elrod', 'category_id'=>2],
            ['content'=> 'Il n’y a qu’une façon d’échouer, c’est d’abandonner avant d’avoir réussi.', 'author'=>'Georges Clemenceau', 'category_id'=>2],
            ['content'=> 'La vie, ce n’est pas souhaiter être ailleurs ou quelqu’un d’autre. C’est apprécier où vous êtes, aimer qui vous êtes et améliorer constamment ces deux états.', 'author'=>'Hal Elrod', 'category_id'=>3],
            ['content'=> 'Arrêtez d’agir comme si la vie était une répétition. Vivez ce jour comme si c’était le dernier. Le passé est passé et révolu. L’avenir n’est pas garanti.', 'author'=>'Dr Wayne W.Dyer', 'category_id'=>3],
            ['content'=> 'Vous ne pouvez choisir ni comment mourir, ni quand. Mais vous pouvez décider de comment vous allez vivre. Maintenant. ', 'author'=>'Joan Baez', 'category_id'=>3],
            ['content'=> 'Ce n’est pas le vent qui décide de votre destination, c’est l’orientation que vous donnez à votre voile. Le vent est pareil pour tous. ', 'author'=>'Jim Rohn', 'category_id'=>4],
            ['content'=> 'En vérité, le chemin importe peu, la volonté d’arriver suffit à tout.  ', 'author'=>'Albert Camus', 'category_id'=>4],
            ['content'=> 'Ne vous demandez pas ce dont le monde a besoin. Demandez-vous ce qui vous éveille à la vie, puis faites-le. Car ce dont le monde a besoin, c’est d’êtres qui s’éveillent à la vie. ', 'author'=>'Howard Thurman', 'category_id'=>4],
            ['content'=> 'Choisis un travail que tu aimes, tu n’auras pas à travailler un seul jour de ta vie.  ', 'author'=>'Confucius', 'category_id'=>5],
            ['content'=> 'Tenez-vous loin des gens qui tentent de diminuer vos ambitions. Les « petites » personnes font toujours cela, mais les « grandes », elles, vous font sentir que vous pouvez également devenir génial. ', 'author'=>'Mark Twain', 'category_id'=>5],
            ['content'=> 'Votre situation actuelle ne reflète pas votre potentiel ultime. ', 'author'=>'Anthony Robbins', 'category_id'=>5],
            ['content'=> 'Croyez en vos rêves et ils se réaliseront peut-être. Croyez en vous et ils se réaliseront sûrement. ', 'author'=>'Martin Luther King', 'category_id'=>6],
            ['content'=> 'Quand on ne peut revenir en arrière, on ne doit que se préoccuper de la meilleure manière d’aller de l’avant. ', 'author'=>'Paulo Coelho', 'category_id'=>6],
            ['content'=> ' Ce qui est plus triste qu’une œuvre inachevée, c’est une œuvre jamais commencée. ', 'author'=>'Christinna Rosseti', 'category_id'=>6],
            ['content'=> ' Souviens-toi que ton bonheur ne dépend que de ce que tu cultives à l’intérieur de toi-même. ', 'author'=>'Lise Bourbeau', 'category_id'=>7],
            ['content'=> ' N’attends pas que les événements arrivent comme tu le souhaites. Décide de vouloir ce qui arrive… et tu seras heureux.', 'author'=>'Epictète', 'category_id'=>7],
            ['content'=> ' La joie est dans tout ce qui nous entoure, il suffit de savoir l’extraire.  ', 'author'=>'Confucius', 'category_id'=>7],
            ['content'=> ' Une pensée positive accompagnée d’une émotion agréable est 100 fois plus puissante qu’une pensée négative accompagnée d’une émotion désagréable.  ', 'author'=>'Rhonda Byrne', 'category_id'=>8],
            ['content'=> ' Nous sommes ce que nous pensons. Tout ce que nous sommes résulte de nos pensées. Avec nos pensées nous bâtissons notre monde.   ', 'author'=>'Bouddha', 'category_id'=>8],
            ['content'=> ' Au fur et à mesure que je modifie mes pensées, le monde autour de moi se transforme.  ', 'author'=>'Louise L. Hay', 'category_id'=>8],
            ['content'=> ' L’optimiste ne refuse jamais de voir le côté négatif des choses ; il refuse simplement de s’attarder dessus.  ', 'author'=>'James Alexander Lockhart', 'category_id'=>9],
            ['content'=> ' Ce qui importe n’est pas l’événement en lui-même, mais l’interprétation qu’on en fait.  ', 'author'=>'Mihaly Csikszentmihalyi', 'category_id'=>9],
            ['content'=> 'Peu importe comment tu te sens; à l’intérieur, essaie toujours de te voir comme un gagnant. Même si tu es derrière, un regard contrôlé, soutenu et confiant peut te donner une marge mentale qui résulte en la victoire.', 'author'=>'Arthur Ashe', 'category_id'=>9],
        ];

        DB::table('quotations')->insert($quotations);

        echo "Données insérées avec succès.\n";
    }
}
