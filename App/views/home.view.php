<?php
/**
 * Home Page View
 *
 * Filename:        home.view.php
 * Location:        /App/views
 * Project:         demo-PHP-MVC-Jokes
 * Date Created:    23/08/2024
 *
 * Author:          YOUR NAME <STUDENT_ID@tafe.wa.edu.au>
 *
 */

loadPartial('header');
loadPartial('navigation');

?>

<main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg">
    <article>
        <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 text-2xl font-bold mb-8">
            <h1>Tadiwanashe's Joke DB</h1>
        </header>

        <section class="flex flex-row flex-wrap justify-center my-8 gap-8">

            <section class="w-1/4 bg-sky-800 text-white shadow rounded p-2 flex flex-row">
                <h4 class="flex-0 w-1/2 -ml-2 mr-6 bg-sky-400 text-black text-lg p-4 -my-2 rounded-l">
                    Jokes:
                </h4>
                <p class="grow text-4xl ml-6">
                    <?= $jokeCount->total ?>
                </p>
            </section>

            <section class="w-1/4 bg-amber-900 text-white shadow rounded p-2 flex flex-row">
                <h4 class="flex-0 w-1/2 -ml-2 mr-6 bg-amber-400 text-black text-lg p-4 -my-2 rounded-l">
                    Categories:
                </h4>
                <p class="grow text-4xl ml-6">
                    <?= $categoryCount->total ?>
                </p>
            </section>

            <section class="w-1/4 bg-red-700 text-white shadow rounded p-2 flex flex-row">
                <h4 class="flex-0 w-1/2 -ml-2 mr-6 bg-red-400 text-black text-lg p-4 -my-2 rounded-l">
                    Users:
                </h4>
                <p class="grow text-4xl ml-6">
                    <?= $userCount->total ?>
                </p>
            </section>

        </section>

        <section class="my-8 flex flex-wrap gap-8 justify-center">

            <?php if (!empty($randomJoke)): ?>
                <article class="max-w-96 min-w-64 bg-white shadow rounded p-2 flex flex-col">
                    <header class="-mx-2 bg-zinc-700 text-zinc-200 text-lg p-4 -mt-2 mb-4 rounded-t flex-0">
                        <h4>
                            <?= $randomJoke->category_name ?>
                        </h4>
                    </header>
                    <section class="flex-grow grid grid-cols-5">
                        <p class="ml-4 col-span-2">
                            <img class="w-24 h-24 " src="https://dummyimage.com/200x200/a1a1aa/fff&text=Image+Here"
                                 alt="">
                        </p>
                        <p class="col-span-3 text-zinc-600"><?= $randomJoke->joke ?></p>
                    </section>
                    <footer class="-mx-2 bg-zinc-200 text-zinc-900 text-sm px-4 py-1 mt-4 -mb-2 rounded-b flex-0">
                        <p class="block w-full text-center px-5 py-2.5 shadow-sm rounded border
                                  text-base font-medium text-zinc-700 bg-zinc-100 hover:bg-zinc-200">
                            <?= $randomJoke->author_name ?>
                        </p>
                    </footer>
                </article>

            <?php else: ?>
            <article class="max-w-96 min-w-64 bg-white shadow rounded p-2 flex flex-col text-center text-xl">
                    <h4>
                        Sorry, no joke this time.
                    </h4>
            </article>

            <?php
            endif;
            ?>
        </section>
        <section class="w-full text-center my-4">
            <button onclick="location.reload();"
                    class="w-full md:w-auto bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 focus:outline-none transition ease-in-out duration-500 rounded shadow-md">
                New Joke
            </button>
        </section>


    </article>
</main>


<?php
loadPartial('footer');
?>
