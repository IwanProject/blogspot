<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            'title' => 'Batman 2021',
            'slug' => 'batman-2021',
            'author' => 'Marvel',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias amet magnam quisquam numquam quasi nam nisi iusto rerum et excepturi est quos quibusdam quia nesciunt ducimus, optio magni voluptatum ex illo repellendus at eum. Harum perferendis pariatur, quas repellat dolorem nam accusamus! Necessitatibus beatae nostrum cupiditate doloremque excepturi natus dolorum suscipit error quis, saepe voluptas hic commodi corrupti magni tenetur maiores omnis, soluta nulla dolore qui fugit? Dicta deleniti, ducimus nostrum incidunt error optio aperiam illo voluptatem vel obcaecati rerum temporibus rem illum nesciunt? Soluta iste sit unde consectetur possimus? Mollitia cupiditate doloremque accusantium vitae inventore iusto at fugit consectetur.'

        ], [
            'title' => 'Avengers Storm',
            'slug' => 'avengers-storm',
            'author' => 'Marvel',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quos, ad. Neque ullam rerum velit, saepe nihil officiis asperiores labore, aliquam quia adipisci dolorum placeat molestiae eveniet ad ut, nam repudiandae expedita. Autem, repellendus adipisci? Consequuntur voluptas illo unde quam magni id, necessitatibus qui reprehenderit. Sed non modi quisquam suscipit quibusdam inventore voluptas laboriosam quis numquam, eligendi, nisi iusto dolore, dolorum facilis ea. Quasi, error. Aperiam illo error ducimus aliquam et architecto fuga suscipit, natus nesciunt labore, quisquam magnam laudantium provident, accusantium qui dolores ipsa perferendis non sit ab eos nihil. Saepe reiciendis harum accusamus voluptates nulla? Cupiditate ut iste provident laudantium atque quisquam, blanditiis, pariatur quam asperiores ducimus excepturi. Tempora commodi vero officia distinctio, quisquam harum quae explicabo ipsam sint doloribus maxime vel magni laboriosam amet doloremque qui beatae quo laudantium tenetur quod similique assumenda aut ut? Rerum dignissimos voluptas ducimus voluptatem animi in, sequi consequatur provident, minima impedit quas error. Delectus minima voluptatum quaerat eum quibusdam numquam accusantium ex. Nisi provident beatae dolorum recusandae nam repellat? Molestiae dolorum quidem, eos cupiditate dolore modi fugit fugiat. Porro itaque a doloribus repellat natus delectus, mollitia ratione ipsam saepe iste! Hic iusto molestiae sapiente numquam, odit blanditiis. Ut, libero repellat! Porro, voluptatum?'

        ]
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        // $post = [];
        // foreach ($posts as $p) {
        //     if ($p['slug'] === $slug) {
        //         $post = $p;
        //     }
        // }

        return $posts->firstWhere('slug', $slug);
    }
}
