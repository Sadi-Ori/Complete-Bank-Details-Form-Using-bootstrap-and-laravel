This project has been occured error of route get method and internal server. There found solution on internet but still not working

How to debug this error 'The GET method is not supported for this route. Supported methods: POST.'?

create_posts_table.php

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('caption');
            $table->string('image');
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
post.php

<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $fillable = ['caption', 'image'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

Controller PostsController

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function create(){
        return view('posts.create');
    }


    public function store(Request $request){
        $request->validate([
            'caption' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        Post::create($request->input());

        dd($request->all());
    }
}
Routes web.php

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
j|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store')->name('p.store');

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Blade file:

<div class="container"> <form action="/p" enctype="multipart/form-data" method="post"> @csrf
Kindly Help me, I've been stack for 3 days because of that above error .

In the browser I have this

 protected function methodNotAllowed(array $others, $method)
    {
        throw new MethodNotAllowedHttpException(
            $others,
            sprintf(
                'The %s method is not supported for this route. Supported methods: %s.',
                $method,
                implode(', ', $others)
            )
        );
    }

In  this kind of question the answer comes:

Edit: According to your comment, your <form> appears to be correct. Could you provide the Envoirement Details that you see on the Whoops! page? They can be found int the bottom right corner.

I assume that you have a html form from which you acces your PostsController. Your tag should look something like this: <form action="{{route('p.store')}}" method="post". You probably have method="get". If so, change the method to post, that should work.





### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
