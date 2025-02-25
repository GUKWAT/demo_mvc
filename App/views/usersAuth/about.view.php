<?php
/**
 * Home Page View
 *
 * Filename:        home.view.php
 * Location:        /App/views
 * Project:         demo-PHP-MVC-Jokes
 * Date Created:    23/08/2024
 *
 * Author:          Tadiwanashe Gukwa <20095319@tafe.wa.edu.au>
 *
 */

loadPartial('header');
loadPartial('navigation');
?>

<section class="mx-auto w-1/2 m-8 bg-zinc-200 text-sm  text-zinc-800 p-4 rounded-lg shadow">
    <header class="-mx-4 bg-zinc-700 text-zinc-200 text-md text-semibold p-4 -mt-4 mb-4 rounded-t flex-0">
        <h4>
            Useful References
        </h4>
    </header>
    <dl class="grid grid-cols-5 gap-2">
        <dt class="col-span-1">Tutorial Part 1:</dt>
        <dd class="col-span-4">
            <a href="https://github.com/AdyGCode/SaaS-FED-Notes/tree/main/session-07"
               class="underline underline-offset-2 text-zinc-900 rounded border-2 border-transparent hover:text-white hover:bg-blue-500 hover:border-blue-500">
                https://github.com/AdyGCode/SaaS-FED-Notes/tree/main/session-07
            </a>
        </dd>
        <dt class="col-span-1">Tutorial Part 2:</dt>
        <dd class="col-span-4">
            <a href="https://github.com/AdyGCode/SaaS-FED-Notes/tree/main/session-07"
               class="underline underline-offset-2 text-zinc-900 rounded border-2 border-transparent hover:text-white hover:bg-purple-500 hover:border-purple-500">
                https://github.com/AdyGCode/SaaS-FED-Notes/tree/main/session-07
            </a>
        </dd>
        <dt class="col-span-1">Source Code:</dt>
        <dd class="col-span-4">
            <a href="https://github.com/AdyGCode/demo-PHP-MVC-Jokes-Demo"
               class="underline underline-offset-2 text-zinc-900 rounded border-2 border-transparent hover:text-white hover:bg-red-500 hover:border-red-500">
                https://github.com/AdyGCode/demo-PHP-MVC-Jokes-Demo
            </a>
        </dd>
        <dt class="col-span-1">HelpDesk</dt>
        <dd class="col-span-4">
            <a href="https://help.screencraft.net.au"
               class="underline underline-offset-2 text-zinc-900 rounded border-2 border-transparent hover:text-white hover:bg-orange-500 hover:border-orange-500">
                https://help.screencraft.net.au
            </a>
        </dd>
        <dt class="col-span-1">HelpDesk FAQs</dt>
        <dd class="col-span-4">
            <a href="https://help.screencraft.net.au/hc/2680392001"
               class="underline underline-offset-2 text-zinc-900 rounded border-2 border-transparent hover:text-white hover:bg-amber-500 hover:border-amber-500">
                https://help.screencraft.net.au/hc/2680392001
            </a>
        </dd>
        <dt class="col-span-1">Make a Request</dt>
        <dd class="col-span-4">
            <a href="https://help.screencraft.net.au/help/2680392001"
               class="underline underline-offset-2 text-zinc-900 rounded border-2 border-transparent hover:text-white hover:bg-lime-500 hover:border-lime-500">
                https://help.screencraft.net.au/help/2680392001</a>
            (TAFE Students only)
        </dd>
    </dl>

</section>

<?php
loadPartial('footer');
?>