<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\BlogRepositoryInterface;
use App\Repositories\BlogTagRepositoryInterface;
use App\Models\Blog;
use App\Models\BlogTag;


class BlogAndBlogTagTableSeeder  extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blogRepository = \App::make('App\Repositories\BlogRepositoryInterface');
        $blogTagRepository = \App::make('App\Repositories\BlogTagRepositoryInterface');

        $blog = $blogRepository->create([
            'id' => 1,
            'title' => 'This is my first article.',
            'body' => '<p>Hi! This is my new blog.</p><p>I hope you enjoy it.</p>',
            'create_user_id' => 1,
        ]);

        $blog = $blogRepository->create([
            'id' => 2,
            'title' => 'This is my second article.',
            'body' => '<p>Hi! How are you today!</p><p>I hope you enjoy it.</p>',
            'create_user_id' => 1,
        ]);

        $blog = $blogRepository->create([
            'id' => 3,
            'title' => 'This is my third article.',
            'body' => '<p>Hi! Have you take lunch?!</p><p>I hope you enjoy it.</p>',
            'create_user_id' => 1,
        ]);

        $blog = $blogRepository->create([
            'id' => 4,
            'title' => 'The 115-year-old refugee with one remaining wish',
            'body' => "Lesbos Island, Greece (CNN)All Eida Karmi wants is to see her family. It's the simple desire of a grandparent, but she's no ordinary grandmother. At 115 years old Eida could be Syria's oldest refugee.  The country didn't even exist when she was born. In her lifetime, she has seen two world wars and the fall of the Ottoman Empire.  Now after escaping her war-torn homeland she sleeps rough in a refugee camp in Greece, still hundreds of miles from her family in Germany.",
            'create_user_id' => 1,
        ]);

        $blog = $blogRepository->create([
            'id' => 5,
            'title' => 'Diver unharmed after great white shark busts through cage',
            'body' => "(CNN)On the off chance that you want to swim with a great white shark, this video might make you think twice. While on a recent diving trip just off the coast of Mexico near Guadalupe Island, one man captured the intense moment when a shark ripped into a cage containing a diver.  A group of divers, captains and instructors stood on a boat as the great white was making a move on its prey, a chunk of tuna floating in the ocean on a lengthy yellow rope.  'They are temporarily blinded when they open their mouths, so when the shark went for the tuna bait on the rope, it accidentally slammed into the cage,' the unidentified man who posted the video wrote on Facebook.",
            'create_user_id' => 1,
        ]);

        $blog = $blogRepository->create([
            'id' => 6,
            'title' => 'Gold prices sinking. Bad sign for Donald Trump?',
            'body' => "They say that all that glitters isn't gold. But maybe that phrase needs to be changed? Gold hasn't done much glittering lately.  The price of gold fell below $1,300 an ounce earlier this week.  It's the first time the yellow metal has traded below that level since the Brexit vote in June shocked global markets. And some experts think that Donald Trump's recent woes may be a reason for gold's slump.",
            'create_user_id' => 1,
        ]);

        $blog = $blogRepository->create([
            'id' => 7,
            'title' => 'The 115-year-old refugee with one remaining wish',
            'body' => "Lesbos Island, Greece (CNN)All Eida Karmi wants is to see her family. It's the simple desire of a grandparent, but she's no ordinary grandmother. At 115 years old Eida could be Syria's oldest refugee.  The country didn't even exist when she was born. In her lifetime, she has seen two world wars and the fall of the Ottoman Empire.  Now after escaping her war-torn homeland she sleeps rough in a refugee camp in Greece, still hundreds of miles from her family in Germany.",
            'create_user_id' => 1,
        ]);

        $blog = $blogRepository->create([
            'id' => 8,
            'title' => 'Diver unharmed after great white shark busts through cage',
            'body' => "Lesbos Island, Greece (CNN)All Eida Karmi wants is to see her family. It's the simple desire of a grandparent, but she's no ordinary grandmother. At 115 years old Eida could be Syria's oldest refugee.  The country didn't even exist when she was born. In her lifetime, she has seen two world wars and the fall of the Ottoman Empire.  Now after escaping her war-torn homeland she sleeps rough in a refugee camp in Greece, still hundreds of miles from her family in Germany.",
            'create_user_id' => 1,
        ]);

        $blog = $blogRepository->create([
            'id' => 9,
            'title' => 'Diver unharmed after great white shark busts through cage',
            'body' => "(CNN)On the off chance that you want to swim with a great white shark, this video might make you think twice. While on a recent diving trip just off the coast of Mexico near Guadalupe Island, one man captured the intense moment when a shark ripped into a cage containing a diver.  A group of divers, captains and instructors stood on a boat as the great white was making a move on its prey, a chunk of tuna floating in the ocean on a lengthy yellow rope.  'They are temporarily blinded when they open their mouths, so when the shark went for the tuna bait on the rope, it accidentally slammed into the cage,' the unidentified man who posted the video wrote on Facebook.",
            'create_user_id' => 1,
        ]);

        $blog = $blogRepository->create([
            'id' => 10,
            'title' => 'Gold prices sinking. Bad sign for Donald Trump?',
            'body' => "They say that all that glitters isn't gold. But maybe that phrase needs to be changed? Gold hasn't done much glittering lately.  The price of gold fell below $1,300 an ounce earlier this week.  It's the first time the yellow metal has traded below that level since the Brexit vote in June shocked global markets. And some experts think that Donald Trump's recent woes may be a reason for gold's slump.",
            'create_user_id' => 1,
        ]);

        $blog = $blogRepository->create([
            'id' => 11,
            'title' => 'Diver unharmed after great white shark busts through cage',
            'body' => "Lesbos Island, Greece (CNN)All Eida Karmi wants is to see her family. It's the simple desire of a grandparent, but she's no ordinary grandmother. At 115 years old Eida could be Syria's oldest refugee.  The country didn't even exist when she was born. In her lifetime, she has seen two world wars and the fall of the Ottoman Empire.  Now after escaping her war-torn homeland she sleeps rough in a refugee camp in Greece, still hundreds of miles from her family in Germany.",
            'create_user_id' => 1,
        ]);

        $blog = $blogRepository->create([
            'id' => 12,
            'title' => 'Diver unharmed after great white shark busts through cage',
            'body' => "(CNN)On the off chance that you want to swim with a great white shark, this video might make you think twice. While on a recent diving trip just off the coast of Mexico near Guadalupe Island, one man captured the intense moment when a shark ripped into a cage containing a diver.  A group of divers, captains and instructors stood on a boat as the great white was making a move on its prey, a chunk of tuna floating in the ocean on a lengthy yellow rope.  'They are temporarily blinded when they open their mouths, so when the shark went for the tuna bait on the rope, it accidentally slammed into the cage,' the unidentified man who posted the video wrote on Facebook.",
            'create_user_id' => 1,
        ]);

        $blog = $blogRepository->create([
            'id' => 13,
            'title' => 'Gold prices sinking. Bad sign for Donald Trump?',
            'body' => "They say that all that glitters isn't gold. But maybe that phrase needs to be changed? Gold hasn't done much glittering lately.  The price of gold fell below $1,300 an ounce earlier this week.  It's the first time the yellow metal has traded below that level since the Brexit vote in June shocked global markets. And some experts think that Donald Trump's recent woes may be a reason for gold's slump.",
            'create_user_id' => 1,
        ]);

        $blogTag = $blogTagRepository->create([
            'blog_id' => 1,
            'tag' => 'GREETING',
        ]);

        $blogTag = $blogTagRepository->create([
            'blog_id' => 2,
            'tag' => 'ART',
        ]);

        $blogTag = $blogTagRepository->create([
            'blog_id' => 2,
            'tag' => 'MUSIC',
        ]);

        $blogTag = $blogTagRepository->create([
            'blog_id' => 4,
            'tag' => 'TRIP',
        ]);

        $blogTag = $blogTagRepository->create([
            'blog_id' => 5,
            'tag' => 'NEWS',
        ]);

        $blogTag = $blogTagRepository->create([
            'blog_id' => 7,
            'tag' => 'MONEY',
        ]);

        $blogTag = $blogTagRepository->create([
            'blog_id' => 7,
            'tag' => 'NEWS',
        ]);

        $blogTag = $blogTagRepository->create([
            'blog_id' => 7,
            'tag' => 'PEOPLE',
        ]);

        $blogTag = $blogTagRepository->create([
            'blog_id' => 8,
            'tag' => 'NEWS',
        ]);

        $blogTag = $blogTagRepository->create([
            'blog_id' => 9,
            'tag' => 'NEWS',
        ]);



    }
}
