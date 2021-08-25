<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'FREE SHIPPING',
                'description' => 'Get 10% cash back, free shipping, free returns, and more at 1000+ top retailers!',
                'image' => [
                    'link' => ['https://drive.google.com/uc?id=1jP15EkQF2y4zUeI8_qDMbsHTctGgR8Em&export=media'],
                    'path' => ['12eJB0SrzYjb3HtOkNGKxV9ps-7COpeyQ/1jP15EkQF2y4zUeI8_qDMbsHTctGgR8Em'],
                ],
                'position' => 'home',
            ],
            [
                'name' => '30 DAYS MONEY BACK',
                'description' => '100% satisfaction guaranteed, or get your money back within 30 days!',
                'image' => [
                    'link' => ['https://drive.google.com/uc?id=1nzIIDxa0Xef7MORD07AUS9bbDr1611Jw&export=media'],
                    'path' => ['12eJB0SrzYjb3HtOkNGKxV9ps-7COpeyQ/1nzIIDxa0Xef7MORD07AUS9bbDr1611Jw'],
                ],
                'position' => 'home',
            ],
            [
                'name' => 'SAFE PAYMENT',
                'description' => 'Pay with the world’s most popular and secure payment methods.',
                'image' => [
                    'link' => ['https://drive.google.com/uc?id=1T--Qqc6GqKWsiMyAcA0OR_-9toMF202_&export=media'],
                    'path' => ['12eJB0SrzYjb3HtOkNGKxV9ps-7COpeyQ/1T--Qqc6GqKWsiMyAcA0OR_-9toMF202_'],
                ],
                'position' => 'home',
            ],
            [
                'name' => 'LOYALTY CUSTOMER',
                'description' => 'Card for the other 30% of their purchases at a rate of 1% cash back.',
                'image' => [
                    'link' => ['https://drive.google.com/uc?id=1-ocXxvkxvMzh4G3-aWY54EtfA7Gf7oHA&export=media'],
                    'path' => ['12eJB0SrzYjb3HtOkNGKxV9ps-7COpeyQ/1-ocXxvkxvMzh4G3-aWY54EtfA7Gf7oHA'],
                ],
                'position' => 'home',
            ],
            [
                'name' => 'Creative Always',
                'description' => 'Stay creative with Billey and the huge collection of premade elements, layouts & effects.',
                'image' => [
                    'link' => ['https://drive.google.com/uc?id=1tEVrOkYRXsjmLcst6g7s4VgY-nRBqDTQ&export=media'],
                    'path' => ['12eJB0SrzYjb3HtOkNGKxV9ps-7COpeyQ/1tEVrOkYRXsjmLcst6g7s4VgY-nRBqDTQ'],
                ],
                'position' => 'about',
            ],
            [
                'name' => 'Express Customization',
                'description' => 'Easy to install and configure the theme customization in a few clicks with Billey.',
                'image' => [
                    'link' => ['https://drive.google.com/uc?id=1S6pjOHvl0vO_Zf7mbya4k-Axm1vchOjf&export=media'],
                    'path' => ['12eJB0SrzYjb3HtOkNGKxV9ps-7COpeyQ/1S6pjOHvl0vO_Zf7mbya4k-Axm1vchOjf'],
                ],
                'position' => 'about',
            ],
            [
                'name' => 'Premium Integrations',
                'description' => 'Integrated premium plugins in Billey is the secret weapon for your business to thrive.',
                'image' => [
                    'link' => ['https://drive.google.com/uc?id=1OugsJR7WvdpogyJpG3XmyhBKmHAfpbPA&export=media'],
                    'path' => ['12eJB0SrzYjb3HtOkNGKxV9ps-7COpeyQ/1OugsJR7WvdpogyJpG3XmyhBKmHAfpbPA'],
                ],
                'position' => 'about',
            ],
            [
                'name' => 'Real-time Editing',
                'description' => 'Edit your work and preview the changes on the screen live with advanced page builder.',
                'image' => [
                    'link' => ['https://drive.google.com/uc?id=1BYUZv0wAnrhAeyF6grXMPbXSlAx54csd&export=media'],
                    'path' => ['12eJB0SrzYjb3HtOkNGKxV9ps-7COpeyQ/1BYUZv0wAnrhAeyF6grXMPbXSlAx54csd'],
                ],
                'position' => 'about',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
