<?php

namespace Database\Seeders;

use App\Models\Discussion;
use App\Models\Topic;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /** @var array<string> */
    protected array $topics = ['laravel', 'livewire', 'inertia', 'php'];

    protected array $discussionTitles = [
        'laravel' => [
            'Best Practices for Laravel Authentication' => [
                'Main Post: I prefer using Laravel Sanctum for secure SPA authentication.',
                'Reply: Don\'t forget to hash passwords and implement rate limiting for login attempts.',
            ],
            'Optimizing Laravel Performance for Large Applications' => [
                'Main Post: Implementing caching with Redis significantly improved our response times.',
                'Reply: Using eager loading has reduced our N+1 query issues dramatically.',
            ],
            'How to Use Laravel Queues Effectively' => [
                'Main Post: I set up Redis queues and it cut our response time in half.',
                'Reply: Horizon helped me monitor jobs and optimize the queue processing.',
            ],
            'Building RESTful APIs with Laravel' => [
                'Main Post: API resources in Laravel make it easy to structure consistent JSON responses.',
                'Reply: Versioning APIs early has helped us maintain backward compatibility.',
            ],
            'Exploring Laravel Livewire Integration' => [
                'Main Post: Integrating Livewire boosted interactivity without sacrificing SEO.',
                'Reply: Combining Livewire and Alpine.js has created a lightweight reactive UI.',
            ],
        ],
        'livewire' => [
            'Optimizing Livewire Components for High-Traffic Applications' => [
                'Main Post: Using wire:model with a debounce reduced excessive server calls in high-load scenarios.',
                'Reply: I refactored my components to chunk data loading, which improved performance significantly.',
            ],
            'Using Livewire with Alpine.js for Dynamic UI' => [
                'Main Post: The synergy between Livewire and Alpine.js creates a seamless dynamic interaction.',
                'Reply: I appreciate how easy it is to bind Alpine.js properties within Livewire components.',
            ],
            'Best Practices for Livewire Event Handling' => [
                'Main Post: Centralizing event listeners within components helps to avoid duplicate code.',
                'Reply: Using $emit for communication between components works best when paired with clear naming conventions.',
            ],
            'How to Debug Livewire Applications Efficiently' => [
                'Main Post: Leveraging Laravel\'s built-in logging along with dd() in Livewire methods speeds up debugging.',
                'Reply: Utilizing browser dev tools to inspect Livewire requests has saved me countless hours.',
            ],
            'Creating Reusable Livewire Components' => [
                'Main Post: I built a set of reusable modal and table components that streamline our project development.',
                'Reply: Designing components for flexibility allowed for their effective reuse across different pages.',
            ],
        ],
        'inertia' => [
            'Getting Started with Inertia.js and Laravel' => [
                'Main Post: Inertia bridges Laravel and Vue seamlessly, simplifying the SPA development process.',
                'Reply: The starter kits provided by Inertia.js were instrumental in kickstarting our project.',
            ],
            'Building Single Page Applications with Inertia.js' => [
                'Main Post: Using Inertia.js, I built a SPA that handles navigation without full page reloads.',
                'Reply: It effectively combines server-side routing with a reactive client-side interface.',
            ],
            'How to Handle Form Submissions in Inertia.js' => [
                'Main Post: Inertia streamlines form submissions and passes validation errors directly back to the UI.',
                'Reply: This approach eliminates the need for redundant API endpoints for form handling.',
            ],
            'Optimizing Inertia.js for Better Performance' => [
                'Main Post: Minimizing payload sizes with partial reloads has noticeably improved performance.',
                'Reply: I optimized our pages by caching common requests and reducing server load.',
            ],
            'Using Inertia.js with Vue or React' => [
                'Main Post: I leveraged Vue with Inertia.js to create interactive, modular UI components.',
                'Reply: The React integration was surprisingly smooth, enabling rapid development of dynamic interfaces.',
            ],
        ],
        'php' => [
            'PHP 8 Features You Should Know About' => [
                'Main Post: The JIT compiler in PHP 8 has boosted our performance in compute-intensive tasks.',
                'Reply: Named arguments and union types have resulted in more readable and robust code.',
            ],
            'How to Secure Your PHP Applications' => [
                'Main Post: Always use prepared statements to defend against SQL injection vulnerabilities.',
                'Reply: I recommend libraries that handle encryption and CSRF tokens for comprehensive application security.',
            ],
            'Building a Discussion Forum with PHP and MySQL' => [
                'Main Post: Implementing threaded discussions and pagination was key to managing large volumes of posts.',
                'Reply: Using password_hash for storing passwords makes authentication secure and straightforward.',
            ],
            'Best Practices for PHP Error Handling' => [
                'Main Post: Integrating Monolog with custom exception handlers has made our error logging much more effective.',
                'Reply: Implementing try/catch blocks strategically reduces the risk of unhandled exceptions in production.',
            ],
            'Exploring Object-Oriented Programming in PHP' => [
                'Main Post: Refactoring legacy code to use namespaces and autoloading has greatly improved our project structure.',
                'Reply: Design patterns like Singleton and Factory have streamlined our application architecture.',
            ],
        ],
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'admin',
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ]);
        User::factory()->create([
            'username' => 'selia',
            'name' => 'selia',
            'email' => 'selia@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'eslam',
            'username' => 'eslam',
            'email' => 'eslam@gmail.com',
        ]);
        User::factory()->create([
            'name' => 'amina',
            'username' => 'amina',
            'email' => 'amina@gmail.com',
        ]);
        collect($this->topics)->each(function (string $topic, int $index) {
            /** @var Topic $topicModel */
            $topicModel = Topic::create([
                'name' => str($topic)->upper(),
                'slug' => str($topic)->slug(),
                'created_at' => now()->subYear()->addDays($index),
                'updated_at' => now()->subYear()->addDays($index),
            ]);
            $i = 1;
            foreach ($this->discussionTitles[$topic] as $key => $value) {
                $userId = User::inRandomOrder()->first()->id;
                $discussion = Discussion::create([
                    'user_id' => $userId,
                    'topic_id' => $topicModel->id,
                    'title' => $key,
                    // 'slug' => fake()->slug(),
                    "pinned_at" => fake()->boolean(30) ?  now()->subYear()->addDays($i) : null,
                    'created_at' => now()->subYear()->addDays($i),
                    'updated_at' => now()->subYear()->addDays($i),
                ]);
                $i++;
                // $postModel = null;
                // foreach ($value as $key => $post) {
                //     $postModel = Post::create([
                //         'user_id' => $key == 0 ? $userId : User::inRandomOrder()->first()->id,
                //         'discussion_id' => $discussion->id,
                //         'parent_id' => $postModel?->id,
                //         'body' => $post,
                //     ]);
                // }
            }

            // collect( $this->discussionTitles[ $topic ] )->each( function ($title, $index) use ($topicModel) {
            // 	Discussion::create( [
            // 		'user_id' => User::inRandomOrder()->first()->id,
            // 		'topic_id' => $topicModel->id,
            // 		'title' => $title,
            // 		'slug' => fake()->slug(),
            // 		'created_at' => now()->subYear()->addDays( $index ),
            // 		'updated_at' => now()->subYear()->addDays( $index ),
            // 	] );
            // } );
        });
    }
}
