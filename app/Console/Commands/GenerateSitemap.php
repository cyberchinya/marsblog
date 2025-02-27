<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Генерация карты сайта';

    public function handle()
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/about'));

        // Добавляем статьи в карту сайта
        $posts = Post::all();
        foreach ($posts as $post) {
            $sitemap->add(Url::create(route('post.show', $post->id))
                ->setLastModificationDate($post->updated_at)
                ->setChangeFrequency('weekly')
                ->setPriority(0.8));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Карта сайта успешно создана!');
    }
}
