<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;


class MoviesTableSeeder extends Seeder
{
    public function run()
    {
        Movie::create([
            'title' => 'Halo',
            'genre' => 'Action',
            'year' => 2021,
            'description' => 'After escaping from the Battle of Reach, Captain Jacob Keyes and his crew, aboard the Halcyon-class battlecruiser The Pillar of Autumn, have discovered an ancient ring in an uncharted area of the universe. Soon after their discovery, they are attacked by several Covenant ships that had followed them from Reach. Their only option is to abandon ship, but not without a fight. Keyes orders their secret weapon to be awakened from cryo-sleep, Master Chief John: Spartan-117. He is, thought to be, the last of the super human soldiers created on Reach known as Spartans. After a noble fight, the Master Chief abandons the ship as well, taking Cortana with him, the A.I. heart of the Pillar of Autumn. He will soon be on a quest that will unveil many secrets about the ring, some of which should lay buried forever...',
            'poster' => '..img/moviepost/halo.jpg',
            'video_path' => '..video/halo.mp4',
        ]);
    }
}
