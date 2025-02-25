<?php
/**
 * FILE TITLE GOES HERE
 *
 * DESCRIPTION OF THE PURPOSE AND USE OF THE CODE
 * MAY BE MORE THAN ONE LINE LONG
 * KEEP LINE LENGTH TO NO MORE THAN 96 CHARACTERS
 *
 * Filename:        index.view.php
 * Location:        ${FILE_LOCATION}
 * Project:         demo-PHP-MVC-Jokes
 * Date Created:    DD/MM/YYYY
 *
 * Author:          Tadiwanashe Gukwa <20095319@tafe.wa.edu.au>
 *
 */

$pageTitle = "Add | Jokes | demo-MVC-Jokes";

loadPartial("header", ["pageTitle"=>$pageTitle]);
loadPartial('navigation');

?>


    <main class="container mx-auto bg-zinc-50 py-8 px-4 shadow shadow-black/25 rounded-b-lg flex flex-col flex-grow">
        <article>
            <header class="bg-zinc-700 text-zinc-200 -mx-4 -mt-8 p-8 mb-8 flex">
                <h1 class="grow text-2xl font-bold ">Jokes - Add</h1>
                <p class="text-md flex-0 px-8 py-2 bg-emerald-500 hover:bg-emerald-600 text-white rounded transition ease-in-out duration-500">
                    <a href="/jokes/create">Add Joke</a>
                </p>
            </header>

            <section>

                <?= loadPartial('errors', [
                    'errors' => $errors ?? []
                ]) ?>

                <form method="POST" action="/jokes">

                    <h2 class="text-2xl font-bold mb-6 text-left text-gray-500">
                        Joke Information
                    </h2>

                    <section class="mb-4">
                        <label for="Content" class="mt-4 pb-1">Given Name:</label>
                        <input type="text" id="Content"
                               name="content" placeholder="Content"
                               class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"
                               value="<?= $joke['content'] ?? '' ?>"/>
                    </section>

                    <section class="mb-4">
                        <label for="Category" class="mt-4 pb-1">Category:</label>
                        <input type="text" id="Category"
                               name="category" placeholder="Category"
                               class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"
                               value="<?= $joke['category'] ?? '' ?>"/>
                    </section>

                    <section class="mb-4">
                        <label for="tags" class="mt-4 pb-1">Tags:</label>
                        <input type="text" id="tags"
                               name="tags" placeholder="Tags"
                               class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"
                               value="<?= $joke['tags'] ?? '' ?>"/>
                    </section>

                    <section class="mb-4">
                        <label for="Author" class="mt-4 pb-1">Author:</label>
                        <input type="text" id="Author"
                               name="author" placeholder="Author"
                               class="w-full px-4 py-2 border border-b-zinc-300 rounded focus:outline-none"
                               value="<?= $joke['author'] ?? '' ?>"/>
                    </section>


                    <button type="submit"
                            class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-3
                               rounded focus:outline-none">
                        Save
                    </button>

                    <a href="/users"
                       class="block text-center w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded
                      focus:outline-none">
                        Cancel
                    </a>

                </form>

            </section>

        </article>
    </main>


<?php
loadPartial("footer");

