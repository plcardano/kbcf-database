<?php

namespace Database\Seeders;

use App\Models\Ministry\Ministry;
use App\Models\Ministry\MinistryCategory;
use Illuminate\Database\Seeder;

class MinistrySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Leadership' => [
                'Core of Leaders',
                'Church Council',
            ],
            'Worship Department' => [
                'Worship Committee',
                'Pastoral Ministry',
                'Music (Band & Singers)',
                'Choir',
                'Ushers',
                'Prayer Committee',
                'Multimedia & Online',
                'Sounds & Technical',
            ],
            'Spiritual Care Department' => [
                'Spiritual Care Committee',
                'DMET - Discipleship & Ministry Engagement Comm',
                'ERDT - Equipping & Resource Dev Committee',
                'Children’s Ministry',
                'Youth Committee',
                'Single Adults Comm',
                'HomeBuilders Comm',
                'Seniors Committee',
                'Assimilation Comm',
                'Discipleship Leader',
            ],
            'Missions Department' => [
                'Missions Committee',
                'Missionary',
                'Campus Outreach Team',
                'Workplace Outreach Team',
                'Community Outreach Team',
            ],
            'KOPF & KKCCS' => [
                'KOPF Board Member',
                'KOPF Staff/Volunteer',
                'KKCCS Board Member',
                'KKCCS Staff/Volunteer',
            ],
            'Membership & Accountability' => [
                'MPER - Membership Promotion, Engagement, Retention Team',
                'DGIT - Decorum, Grievance, Investigation Team',
                'DRPT - Discipline, Restoration Program Team',
                'M&E - Monitoring & Evaluation Team',
            ],
            'Building Project' => [
                'Building Project Committee',
            ],
            'Admin Finance Department' => [
                'Pastoral Staff/VOW',
                'Office Staff/VOW',
                'Building Maintenance Committee',
            ],
        ];

        foreach ($categories as $category => $ministries) {
            // Create a ministry category
            $ministryCategory = MinistryCategory::create([
                'name' => $category,
            ]);

            // Create associated ministries for the category
            foreach ($ministries as $ministry) {
                Ministry::create([
                    'ministry_category_id' => $ministryCategory->id,
                    'name' => $ministry,
                ]);
            }
        }
    }
}
