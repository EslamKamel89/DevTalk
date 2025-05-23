<?php

namespace Database\Seeders;

use App\Models\Discussion;
use App\Models\Post;
use App\Models\Topic;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /** @var array<string> */
    protected array $topics = ['laravel', 'livewire', 'inertia', 'php', 'flutter', 'nuxt js', 'vue js', 'ASP.NET'];

    protected array $discussionTitles = [
        'laravel' => [
            'Best Practices for Laravel Authentication' => [
                'I prefer using Laravel Sanctum for secure SPA authentication.',
                'Don\'t forget to hash passwords and implement rate limiting for login attempts.',
                'Has anyone tried multi-guard authentication? I need advice on implementation.',
                'JWT vs. Sanctum—what’s better for mobile apps?',
                'Always use `bcrypt` for password hashing—it’s built into Laravel.',
                'Two-factor authentication (2FA) is a must for sensitive apps. Laravel has great packages for this.',
                'Avoid storing plaintext API tokens. Use encrypted database fields.',
                'How do you handle token revocation in large-scale apps?',
                'Session-based auth is still viable for monolithic apps.',
                'I recommend Fortify for quick auth scaffolding.',
                'Custom middleware for role-based access works wonders.',
                'OAuth2 with Passport is overkill for most projects—Sanctum is simpler.',
                'Pro tip: Use `throttle` middleware to prevent brute-force attacks.',
                'Anyone using socialite for social media logins? Share your experiences!',
                'How to handle "Remember Me" functionality securely?',
                'Password reset flows should include expiration checks.',
                'Avoid rolling your own auth—Laravel’s built-in solutions are battle-tested.',
                'Best practices for logging auth attempts?',
                'How to test authentication flows with PHPUnit?',
                'Secure cookie settings are critical—don’t overlook them.',
            ],
            'Optimizing Laravel Performance for Large Applications' => [
                'Implementing caching with Redis significantly improved our response times.',
                'Using eager loading has reduced our N+1 query issues dramatically.',
                'Database indexing is often overlooked but crucial for performance.',
                'OPcache preloading in PHP 8+ is a game-changer.',
                'How do you benchmark query performance? I recommend Clockwork.',
                'Queue workers should be monitored—Supervisor is your friend.',
                'Static asset optimization (e.g., Laravel Mix) reduces frontend load times.',
                'Anyone tried Spatie’s Laravel Response Cache package?',
                'Avoid bloarting your `composer.json`—only require what you need.',
                'Database sharding for horizontal scaling—worth the effort?',
                'Laravel Octane (Swoole/RoadRunner) can double throughput.',
                'Pro tip: Use `whereHas` instead of `has` for complex queries.',
                'How to optimize Eloquent for read-heavy applications?',
                'Cache-heavy apps should consider atomic locks for race conditions.',
                'Frontend performance: Defer JS loading and leverage CDNs.',
                'Database connection pooling—anyone tried pgBouncer with Laravel?',
                'Logging slow queries helps identify bottlenecks.',
                'Horizon metrics are gold for tuning queue performance.',
                'Lazy collections save memory for large datasets.',
                'When to use raw SQL vs. Eloquent? Context matters!',
            ],
            'How to Use Laravel Queues Effectively' => [
                ' I set up Redis queues and it cut our response time in half.',
                'Horizon helped me monitor jobs and optimize the queue processing.',
            ],
            'Building RESTful APIs with Laravel' => [
                ' API resources in Laravel make it easy to structure consistent JSON responses.',
                'Versioning APIs early has helped us maintain backward compatibility.',
            ],
            'Exploring Laravel Livewire Integration' => [
                ' Integrating Livewire boosted interactivity without sacrificing SEO.',
                'Combining Livewire and Alpine.js has created a lightweight reactive UI.',
            ],
        ],
        'livewire' => [
            'Optimizing Livewire Components for High-Traffic Applications' => [
                'Using wire:model with a debounce reduced excessive server calls in high-load scenarios.',
                'I refactored my components to chunk data loading, which improved performance significantly.',
                'Lazy-loading components with `wire:init` helps initial page load.',
                'How to avoid Livewire’s "n+1" problem for nested components?',
                'Polling is convenient but can hammer your server—use sparingly!',
                'Server-side rendering (SSR) with Livewire 3 is promising for SEO.',
                'Cache computed properties to avoid redundant calculations.',
                'Anyone using Livewire with Turbolinks? Caveats?',
                'Optimize Alpine.js directives to reduce Livewire re-renders.',
                'Database queries in `mount()` vs. `render()`—best practices?',
                'Pro tip: Use `wire:ignore` for static UI sections.',
                'How to handle WebSocket disconnects gracefully?',
                'Avoid bloated payloads—only send necessary data to the frontend.',
                'Livewire’s `hydrate` lifecycle hook is underrated for optimizations.',
                'Testing Livewire with PestPHP is a joy—highly recommended.',
                'Dynamic query strings can slow down components—use judiciously.',
                'Prefetching data for tabs/modals improves perceived performance.',
                'How to debug Livewire network requests efficiently?',
                'Custom pagination solutions can reduce DOM updates.',
                'Livewire + Volt (the new functional API) is a productivity booster.',
            ],
            'Using Livewire with Alpine.js for Dynamic UI' => [
                ' The synergy between Livewire and Alpine.js creates a seamless dynamic interaction.',
                'I appreciate how easy it is to bind Alpine.js properties within Livewire components.',
            ],
            'Best Practices for Livewire Event Handling' => [
                ' Centralizing event listeners within components helps to avoid duplicate code.',
                'Using $emit for communication between components works best when paired with clear naming conventions.',
            ],
            'How to Debug Livewire Applications Efficiently' => [
                ' Leveraging Laravel\'s built-in logging along with dd() in Livewire methods speeds up debugging.',
                'Utilizing browser dev tools to inspect Livewire requests has saved me countless hours.',
            ],
            'Creating Reusable Livewire Components' => [
                ' I built a set of reusable modal and table components that streamline our project development.',
                'Designing components for flexibility allowed for their effective reuse across different pages.',
            ],
        ],
        'inertia' => [
            'Getting Started with Inertia.js and Laravel' => [
                ' Inertia bridges Laravel and Vue seamlessly, simplifying the SPA development process.',
                'The starter kits provided by Inertia.js were instrumental in kickstarting our project.',
            ],
            'Building Single Page Applications with Inertia.js' => [
                ' Using Inertia.js, I built a SPA that handles navigation without full page reloads.',
                'It effectively combines server-side routing with a reactive client-side interface.',
            ],
            'How to Handle Form Submissions in Inertia.js' => [
                ' Inertia streamlines form submissions and passes validation errors directly back to the UI.',
                'This approach eliminates the need for redundant API endpoints for form handling.',
            ],
            'Optimizing Inertia.js for Better Performance' => [
                ' Minimizing payload sizes with partial reloads has noticeably improved performance.',
                'I optimized our pages by caching common requests and reducing server load.',
            ],
            'Using Inertia.js with Vue or React' => [
                ' I leveraged Vue with Inertia.js to create interactive, modular UI components.',
                'The React integration was surprisingly smooth, enabling rapid development of dynamic interfaces.',
            ],
        ],
        'php' => [
            'PHP 8 Features You Should Know About' => [
                ' The JIT compiler in PHP 8 has boosted our performance in compute-intensive tasks.',
                'Named arguments and union types have resulted in more readable and robust code.',
            ],
            'How to Secure Your PHP Applications' => [
                ' Always use prepared statements to defend against SQL injection vulnerabilities.',
                'I recommend libraries that handle encryption and CSRF tokens for comprehensive application security.',
            ],
            'Building a Discussion Forum with PHP and MySQL' => [
                ' Implementing threaded discussions and pagination was key to managing large volumes of posts.',
                'Using password_hash for storing passwords makes authentication secure and straightforward.',
            ],
            'Best Practices for PHP Error Handling' => [
                ' Integrating Monolog with custom exception handlers has made our error logging much more effective.',
                'Implementing try/catch blocks strategically reduces the risk of unhandled exceptions in production.',
            ],
            'Exploring Object-Oriented Programming in PHP' => [
                ' Refactoring legacy code to use namespaces and autoloading has greatly improved our project structure.',
                'Design patterns like Singleton and Factory have streamlined our application architecture.',
            ],
        ],
        'flutter' => [
            'Getting Started with Flutter for Cross-Platform Mobile Development' => [
                'Flutter’s hot-reload feature significantly speeds up UI development and debugging.',
                'Dart’s rich widget system allows developers to build beautiful native interfaces quickly.',
            ],
            'State Management in Flutter: Which Approach Is Best?' => [
                'Provider is my go-to solution for state management due to its simplicity and scalability.',
                'Bloc and Riverpod are also great options for larger apps requiring predictable state changes.',
            ],
            'Creating Animations in Flutter' => [
                'Flutter provides powerful animation APIs that allow developers to create complex motion effects.',
                'Implicit and explicit animations give fine-grained control over visual behavior.',
            ],
            'Flutter vs. React Native: A Developer’s Perspective' => [
                'Flutter offers better consistency across platforms due to its own rendering engine.',
                'React Native feels more familiar to web developers but can suffer from platform inconsistencies.',
            ],
            'Deploying Flutter Apps to Google Play and App Store' => [
                'Setting up release builds and signing keys was the most challenging part of deployment.',
                'Once configured, publishing to both stores was a relatively smooth experience.',
            ],
        ],

        'nuxt js' => [
            'Why Choose Nuxt.js for Your Vue.js Project?' => [
                'Nuxt.js gives you automatic routing, SSR, and code splitting out of the box.',
                'Its opinionated structure makes it ideal for scalable Vue applications.',
            ],
            'Understanding Middleware in Nuxt.js' => [
                'Middleware allows us to run custom logic before rendering a page or group of pages.',
                'We used middleware to manage auth guards and redirect unauthorized users.',
            ],
            'Speed Up Your Nuxt.js App with Static Site Generation' => [
                'By leveraging generate routes, we turned dynamic pages into static HTML files.',
                'This reduced server load and improved SEO dramatically.',
            ],
            'Working with Vuex and Composition API in Nuxt.js' => [
                'Vuex works well for global state management, especially in large-scale apps.',
                'The Composition API improves readability and reusability of shared logic.',
            ],
            'Deploying Nuxt.js to Vercel and Netlify' => [
                'Vercel and Netlify make deploying Nuxt apps fast and easy.',
                'Static generation support means zero configuration for serverless deployments.',
            ],
        ],

        'vue js' => [
            'Vue.js 3 Composition API vs. Options API' => [
                'The Composition API helps organize logic by concern rather than lifecycle methods.',
                'Options API still works well for small components or teams transitioning from Vue 2.',
            ],
            'Component-Based Architecture in Vue.js' => [
                'Breaking down the app into reusable components made maintenance much easier.',
                'Props and events provide clear communication between parent and child components.',
            ],
            'Using Vue Router for Dynamic Navigation' => [
                'Lazy loading routes helped reduce initial load time on large Vue applications.',
                'Dynamic route matching allowed us to build flexible admin dashboards and user profiles.',
            ],
            'Performance Optimization Techniques in Vue.js' => [
                'Memoization using computed properties kept our app responsive even with large datasets.',
                'Avoiding unnecessary watchers and optimizing v-for loops made a big difference.',
            ],
            'Vue DevTools: Enhancing Debugging Experience' => [
                'Vue DevTools help inspect component trees, props, and emitted events visually.',
                'Time-travel debugging and event tracing are invaluable during development.',
            ],
        ],

        'ASP.NET' => [
            'Getting Started with ASP.NET Core for Web APIs' => [
                'ASP.NET Core is perfect for building RESTful services with minimal overhead.',
                'Built-in dependency injection and middleware pipeline make it highly testable and modular.',
            ],
            'Blazor: Running C# in the Browser' => [
                'Blazor brings the power of C# and .NET to the frontend with WebAssembly.',
                'It’s a game-changer for teams with strong C# backgrounds.',
            ],
            'Entity Framework Core: Getting the Most Out of ORMs' => [
                'EF Core abstracts away raw SQL queries while still allowing direct access when needed.',
                'Code-first migrations made database versioning seamless and reliable.',
            ],
            'Securing .NET Applications with Identity and JWT' => [
                'ASP.NET Identity provides a solid foundation for user registration and login.',
                'JWT-based authentication ensures secure token exchange in single-page applications.',
            ],
            'Improving Performance in .NET Applications' => [
                'Caching frequently accessed data reduced latency and improved response times.',
                'Profiling tools like Application Insights helped identify bottlenecks in real-time.',
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
                $postModel = null;
                foreach ($value as $key => $post) {
                    $postModel = Post::create([
                        'user_id' => $key == 0 ? $userId : User::inRandomOrder()->first()->id,
                        'discussion_id' => $discussion->id,
                        'parent_id' => $postModel?->id,
                        'body' => $post,
                    ]);
                }
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
