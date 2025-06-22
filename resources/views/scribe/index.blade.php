<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Laravel API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                                <a href="#endpoints-GETapi-user">GET api/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-news">
                                <a href="#endpoints-GETapi-v1-news">GET api/v1/news</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-news-featured">
                                <a href="#endpoints-GETapi-v1-news-featured">GET api/v1/news/featured</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-news--slug-">
                                <a href="#endpoints-GETapi-v1-news--slug-">GET api/v1/news/{slug}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-projects">
                                <a href="#endpoints-GETapi-v1-projects">GET api/v1/projects</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-projects-featured">
                                <a href="#endpoints-GETapi-v1-projects-featured">GET api/v1/projects/featured</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-projects-statuses">
                                <a href="#endpoints-GETapi-v1-projects-statuses">GET api/v1/projects/statuses</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-projects--slug-">
                                <a href="#endpoints-GETapi-v1-projects--slug-">GET api/v1/projects/{slug}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-competitions">
                                <a href="#endpoints-GETapi-v1-competitions">GET api/v1/competitions</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-competitions-active">
                                <a href="#endpoints-GETapi-v1-competitions-active">GET api/v1/competitions/active</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-competitions--slug-">
                                <a href="#endpoints-GETapi-v1-competitions--slug-">GET api/v1/competitions/{slug}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-vacancies">
                                <a href="#endpoints-GETapi-v1-vacancies">GET api/v1/vacancies</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-vacancies-active">
                                <a href="#endpoints-GETapi-v1-vacancies-active">GET api/v1/vacancies/active</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-vacancies--slug-">
                                <a href="#endpoints-GETapi-v1-vacancies--slug-">GET api/v1/vacancies/{slug}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-legislation">
                                <a href="#endpoints-GETapi-v1-legislation">GET api/v1/legislation</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-legislation-categories">
                                <a href="#endpoints-GETapi-v1-legislation-categories">GET api/v1/legislation/categories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-legislation--id-">
                                <a href="#endpoints-GETapi-v1-legislation--id-">GET api/v1/legislation/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-legislation--id--download">
                                <a href="#endpoints-POSTapi-v1-legislation--id--download">POST api/v1/legislation/{id}/download</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-subordinate-institutions">
                                <a href="#endpoints-GETapi-v1-subordinate-institutions">GET api/v1/subordinate-institutions</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-subordinate-institutions--id-">
                                <a href="#endpoints-GETapi-v1-subordinate-institutions--id-">GET api/v1/subordinate-institutions/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-settings">
                                <a href="#endpoints-GETapi-v1-settings">GET api/v1/settings</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-settings-all">
                                <a href="#endpoints-GETapi-v1-settings-all">GET api/v1/settings/all</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-settings-contact">
                                <a href="#endpoints-GETapi-v1-settings-contact">GET api/v1/settings/contact</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-v1-settings-social">
                                <a href="#endpoints-GETapi-v1-settings-social">GET api/v1/settings/social</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-v1-contact">
                                <a href="#endpoints-POSTapi-v1-contact">POST api/v1/contact</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: June 21, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-news">GET api/v1/news</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-news">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/news" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/news"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-news">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 5,
            &quot;title&quot;: {
                &quot;ka&quot;: &quot;ახალგაზრდა სპორტსმენებმა საერთაშორისო ტურნირზე წარმატებას მიაღწიეს&quot;,
                &quot;en&quot;: &quot;Young athletes achieved success at an international tournament&quot;
            },
            &quot;content&quot;: {
                &quot;ka&quot;: &quot;&lt;p&gt;საქართველოს ძიუდოისტთა ახალგაზრდულმა ნაკრებმა პრაღაში გამართულ ევროპის თასზე 3 ოქროს, 2 ვერცხლისა და 5 ბრინჯაოს მედალი მოიპოვა. გუნდურ ჩათვლაში საქართველომ პირველი ადგილი დაიკავა.&lt;/p&gt;&lt;p&gt;სამინისტრო ულოცავს სპორტსმენებს ამ მნიშვნელოვან გამარჯვებას.&lt;/p&gt;&quot;,
                &quot;en&quot;: &quot;&lt;p&gt;The Georgian youth judo team won 3 gold, 2 silver, and 5 bronze medals at the European Cup held in Prague. Georgia took first place in the team competition.&lt;/p&gt;&lt;p&gt;The Ministry congratulates the athletes on this important victory.&lt;/p&gt;&quot;
            },
            &quot;excerpt&quot;: {
                &quot;ka&quot;: &quot;საქართველოს ძიუდოისტთა ახალგაზრდულმა ნაკრებმა 10 მედალი მოიპოვა.&quot;,
                &quot;en&quot;: &quot;The Georgian youth judo team won 10 medals.&quot;
            },
            &quot;slug&quot;: &quot;young-athletes-achieved-success-at-an-international-tournament&quot;,
            &quot;featured_image&quot;: &quot;news-images/01JY7J5A93NYKBG2P821NX3THC.jpg&quot;,
            &quot;is_published&quot;: true,
            &quot;published_at&quot;: &quot;2025-06-11T20:52:36.000000Z&quot;,
            &quot;views_count&quot;: 2,
            &quot;created_at&quot;: &quot;2025-06-20T20:51:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-20T20:58:22.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;title&quot;: {
                &quot;ka&quot;: &quot;საქართველოს ფოლკლორის ეროვნული ფესტივალი იწყება&quot;,
                &quot;en&quot;: &quot;The National Folklore Festival of Georgia begins&quot;
            },
            &quot;content&quot;: {
                &quot;ka&quot;: &quot;&lt;p&gt;ფესტივალი, რომელიც წელს საქართველოს სხვადასხვა რეგიონში გაიმართება, მიზნად ისახავს ქართული ხალხური სიმღერისა და ცეკვის უნიკალური ნიმუშების შენარჩუნებასა და პოპულარიზაციას. დასკვნითი გალა კონცერტი თბილისში, ფილარმონიის დიდ საკონცერტო დარბაზში გაიმართება.&lt;/p&gt;&quot;,
                &quot;en&quot;: &quot;&lt;p&gt;The festival, which will be held in different regions of Georgia this year, aims to preserve and popularize unique examples of Georgian folk song and dance. The final gala concert will be held in Tbilisi, in the Grand Concert Hall of the Philharmonic.&lt;/p&gt;&quot;
            },
            &quot;excerpt&quot;: {
                &quot;ka&quot;: &quot;ფესტივალი მიზნად ისახავს ქართული ხალხური სიმღერისა და ცეკვის პოპულარიზაციას.&quot;,
                &quot;en&quot;: &quot;The festival aims to promote Georgian folk song and dance.&quot;
            },
            &quot;slug&quot;: &quot;the-national-folklore-festival-of-georgia-begins&quot;,
            &quot;featured_image&quot;: null,
            &quot;is_published&quot;: true,
            &quot;published_at&quot;: &quot;2025-06-07T20:52:36.000000Z&quot;,
            &quot;views_count&quot;: 3028,
            &quot;created_at&quot;: &quot;2025-06-20T20:51:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-20T20:52:36.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: {
                &quot;ka&quot;: &quot;ქართული კინოს მხარდაჭერის ახალი პროგრამა ამოქმედდა&quot;,
                &quot;en&quot;: &quot;A new support program for Georgian cinema has been launched&quot;
            },
            &quot;content&quot;: {
                &quot;ka&quot;: &quot;&lt;p&gt;კინოცენტრ &bdquo;ქართული ფილმის&ldquo; ინიციატივით და კულტურის სამინისტროს მხარდაჭერით, ახალი პროგრამა ამოქმედდა, რომელიც მიზნად ისახავს ახალგაზრდა რეჟისორების დაფინანსებას და ქართული კინოპროდუქციის საერთაშორისო ბაზარზე პოპულარიზაციას. პროგრამის ბიუჯეტი 2 მილიონ ლარს შეადგენს.&lt;/p&gt;&quot;,
                &quot;en&quot;: &quot;&lt;p&gt;With the initiative of the \&quot;Georgian Film\&quot; National Film Center and the support of the Ministry of Culture, a new program has been launched to finance young directors and promote Georgian film production on the international market. The program budget is 2 million GEL.&lt;/p&gt;&quot;
            },
            &quot;excerpt&quot;: {
                &quot;ka&quot;: &quot;პროგრამა მიზნად ისახავს ახალგაზრდა რეჟისორების დაფინანსებას და ქართული კინოს პოპულარიზაციას.&quot;,
                &quot;en&quot;: &quot;The program aims to finance young directors and promote Georgian cinema.&quot;
            },
            &quot;slug&quot;: &quot;a-new-support-program-for-georgian-cinema-has-been-launched&quot;,
            &quot;featured_image&quot;: null,
            &quot;is_published&quot;: true,
            &quot;published_at&quot;: &quot;2025-06-05T20:52:36.000000Z&quot;,
            &quot;views_count&quot;: 478,
            &quot;created_at&quot;: &quot;2025-06-20T20:51:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-20T20:52:36.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;title&quot;: {
                &quot;ka&quot;: &quot;თბილისში წიგნის საერთაშორისო ფესტივალი გაიხსნა&quot;,
                &quot;en&quot;: &quot;Tbilisi International Book Festival has opened&quot;
            },
            &quot;content&quot;: {
                &quot;ka&quot;: &quot;&lt;p&gt;დღეს, ექსპო ჯორჯიას საგამოფენო პავილიონებში თბილისის წიგნის საერთაშორისო ფესტივალი ოფიციალურად გაიხსნა. ფესტივალში 50-ზე მეტი გამომცემლობა და 20-მდე უცხოელი ავტორი მონაწილეობს. ფესტივალის ფარგლებში გაიმართება პრეზენტაციები, დისკუსიები და ვორქშოფები.&lt;/p&gt;&quot;,
                &quot;en&quot;: &quot;&lt;p&gt;Today, the Tbilisi International Book Festival was officially opened in the exhibition pavilions of Expo Georgia. More than 50 publishing houses and up to 20 foreign authors are participating in the festival. Presentations, discussions, and workshops will be held within the framework of the festival.&lt;/p&gt;&quot;
            },
            &quot;excerpt&quot;: {
                &quot;ka&quot;: &quot;ფესტივალში 50-ზე მეტი გამომცემლობა და 20-მდე უცხოელი ავტორი მონაწილეობს.&quot;,
                &quot;en&quot;: &quot;More than 50 publishing houses and up to 20 foreign authors are participating in the festival.&quot;
            },
            &quot;slug&quot;: &quot;tbilisi-international-book-festival-has-opened&quot;,
            &quot;featured_image&quot;: null,
            &quot;is_published&quot;: true,
            &quot;published_at&quot;: &quot;2025-05-31T20:52:36.000000Z&quot;,
            &quot;views_count&quot;: 1326,
            &quot;created_at&quot;: &quot;2025-06-20T20:51:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-20T20:52:36.000000Z&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: {
                &quot;ka&quot;: &quot;საქართველოს კულტურის სამინისტრო ციფრული ტრანსფორმაციის ახალ ეტაპზე გადადის&quot;,
                &quot;en&quot;: &quot;The Ministry of Culture of Georgia is entering a new stage of digital transformation&quot;
            },
            &quot;content&quot;: {
                &quot;ka&quot;: &quot;&lt;p&gt;საქართველოს კულტურის, სპორტისა და ახალგაზრდობის სამინისტრო აცხადებს, რომ იწყებს მასშტაბურ პროექტს, რომელიც მიზნად ისახავს კულტურული მემკვიდრეობის გაციფრულებას და თანამედროვე ტექნოლოგიების დანერგვას სამუზეუმო და საარქივო სივრცეებში. პროექტი მოიცავს ეროვნული მუზეუმის ექსპონატების 3D სკანირებას, ვირტუალური ტურების შექმნას და კულტურული ღონისძიებების ონლაინ პლატფორმის განვითარებას.&lt;/p&gt;&lt;p&gt;&bdquo;ჩვენი მიზანია, საქართველოს მდიდარი კულტურა ხელმისაწვდომი გავხადოთ მთელი მსოფლიოსთვის,&ldquo; - განაცხადა მინისტრმა.&lt;/p&gt;&quot;,
                &quot;en&quot;: &quot;&lt;p&gt;The Ministry of Culture, Sport and Youth of Georgia announces the launch of a large-scale project aimed at digitizing cultural heritage and introducing modern technologies in museums and archives. The project includes 3D scanning of exhibits from the National Museum, creating virtual tours, and developing an online platform for cultural events.&lt;/p&gt;&lt;p&gt;\&quot;Our goal is to make Georgia&#039;s rich culture accessible to the whole world,\&quot; said the Minister.&lt;/p&gt;&quot;
            },
            &quot;excerpt&quot;: {
                &quot;ka&quot;: &quot;სამინისტრო კულტურული მემკვიდრეობის გაციფრულების მასშტაბურ პროექტს იწყებს.&quot;,
                &quot;en&quot;: &quot;The Ministry is launching a large-scale project for the digitization of cultural heritage.&quot;
            },
            &quot;slug&quot;: &quot;the-ministry-of-culture-of-georgia-is-entering-a-new-stage-of-digital-transformation&quot;,
            &quot;featured_image&quot;: null,
            &quot;is_published&quot;: true,
            &quot;published_at&quot;: &quot;2025-05-29T20:52:36.000000Z&quot;,
            &quot;views_count&quot;: 1420,
            &quot;created_at&quot;: &quot;2025-06-20T20:51:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-20T20:52:36.000000Z&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8000/api/v1/news?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8000/api/v1/news?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/news?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost:8000/api/v1/news&quot;,
        &quot;per_page&quot;: 12,
        &quot;to&quot;: 5,
        &quot;total&quot;: 5
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-news" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-news"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-news"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-news" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-news">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-news" data-method="GET"
      data-path="api/v1/news"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-news', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-news"
                    onclick="tryItOut('GETapi-v1-news');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-news"
                    onclick="cancelTryOut('GETapi-v1-news');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-news"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/news</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-news"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-news"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-news-featured">GET api/v1/news/featured</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-news-featured">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/news/featured" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/news/featured"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-news-featured">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 5,
            &quot;title&quot;: {
                &quot;ka&quot;: &quot;ახალგაზრდა სპორტსმენებმა საერთაშორისო ტურნირზე წარმატებას მიაღწიეს&quot;,
                &quot;en&quot;: &quot;Young athletes achieved success at an international tournament&quot;
            },
            &quot;content&quot;: {
                &quot;ka&quot;: &quot;&lt;p&gt;საქართველოს ძიუდოისტთა ახალგაზრდულმა ნაკრებმა პრაღაში გამართულ ევროპის თასზე 3 ოქროს, 2 ვერცხლისა და 5 ბრინჯაოს მედალი მოიპოვა. გუნდურ ჩათვლაში საქართველომ პირველი ადგილი დაიკავა.&lt;/p&gt;&lt;p&gt;სამინისტრო ულოცავს სპორტსმენებს ამ მნიშვნელოვან გამარჯვებას.&lt;/p&gt;&quot;,
                &quot;en&quot;: &quot;&lt;p&gt;The Georgian youth judo team won 3 gold, 2 silver, and 5 bronze medals at the European Cup held in Prague. Georgia took first place in the team competition.&lt;/p&gt;&lt;p&gt;The Ministry congratulates the athletes on this important victory.&lt;/p&gt;&quot;
            },
            &quot;excerpt&quot;: {
                &quot;ka&quot;: &quot;საქართველოს ძიუდოისტთა ახალგაზრდულმა ნაკრებმა 10 მედალი მოიპოვა.&quot;,
                &quot;en&quot;: &quot;The Georgian youth judo team won 10 medals.&quot;
            },
            &quot;slug&quot;: &quot;young-athletes-achieved-success-at-an-international-tournament&quot;,
            &quot;featured_image&quot;: &quot;news-images/01JY7J5A93NYKBG2P821NX3THC.jpg&quot;,
            &quot;is_published&quot;: true,
            &quot;published_at&quot;: &quot;2025-06-11T20:52:36.000000Z&quot;,
            &quot;views_count&quot;: 2,
            &quot;created_at&quot;: &quot;2025-06-20T20:51:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-20T20:58:22.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;title&quot;: {
                &quot;ka&quot;: &quot;საქართველოს ფოლკლორის ეროვნული ფესტივალი იწყება&quot;,
                &quot;en&quot;: &quot;The National Folklore Festival of Georgia begins&quot;
            },
            &quot;content&quot;: {
                &quot;ka&quot;: &quot;&lt;p&gt;ფესტივალი, რომელიც წელს საქართველოს სხვადასხვა რეგიონში გაიმართება, მიზნად ისახავს ქართული ხალხური სიმღერისა და ცეკვის უნიკალური ნიმუშების შენარჩუნებასა და პოპულარიზაციას. დასკვნითი გალა კონცერტი თბილისში, ფილარმონიის დიდ საკონცერტო დარბაზში გაიმართება.&lt;/p&gt;&quot;,
                &quot;en&quot;: &quot;&lt;p&gt;The festival, which will be held in different regions of Georgia this year, aims to preserve and popularize unique examples of Georgian folk song and dance. The final gala concert will be held in Tbilisi, in the Grand Concert Hall of the Philharmonic.&lt;/p&gt;&quot;
            },
            &quot;excerpt&quot;: {
                &quot;ka&quot;: &quot;ფესტივალი მიზნად ისახავს ქართული ხალხური სიმღერისა და ცეკვის პოპულარიზაციას.&quot;,
                &quot;en&quot;: &quot;The festival aims to promote Georgian folk song and dance.&quot;
            },
            &quot;slug&quot;: &quot;the-national-folklore-festival-of-georgia-begins&quot;,
            &quot;featured_image&quot;: null,
            &quot;is_published&quot;: true,
            &quot;published_at&quot;: &quot;2025-06-07T20:52:36.000000Z&quot;,
            &quot;views_count&quot;: 3028,
            &quot;created_at&quot;: &quot;2025-06-20T20:51:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-20T20:52:36.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;title&quot;: {
                &quot;ka&quot;: &quot;ქართული კინოს მხარდაჭერის ახალი პროგრამა ამოქმედდა&quot;,
                &quot;en&quot;: &quot;A new support program for Georgian cinema has been launched&quot;
            },
            &quot;content&quot;: {
                &quot;ka&quot;: &quot;&lt;p&gt;კინოცენტრ &bdquo;ქართული ფილმის&ldquo; ინიციატივით და კულტურის სამინისტროს მხარდაჭერით, ახალი პროგრამა ამოქმედდა, რომელიც მიზნად ისახავს ახალგაზრდა რეჟისორების დაფინანსებას და ქართული კინოპროდუქციის საერთაშორისო ბაზარზე პოპულარიზაციას. პროგრამის ბიუჯეტი 2 მილიონ ლარს შეადგენს.&lt;/p&gt;&quot;,
                &quot;en&quot;: &quot;&lt;p&gt;With the initiative of the \&quot;Georgian Film\&quot; National Film Center and the support of the Ministry of Culture, a new program has been launched to finance young directors and promote Georgian film production on the international market. The program budget is 2 million GEL.&lt;/p&gt;&quot;
            },
            &quot;excerpt&quot;: {
                &quot;ka&quot;: &quot;პროგრამა მიზნად ისახავს ახალგაზრდა რეჟისორების დაფინანსებას და ქართული კინოს პოპულარიზაციას.&quot;,
                &quot;en&quot;: &quot;The program aims to finance young directors and promote Georgian cinema.&quot;
            },
            &quot;slug&quot;: &quot;a-new-support-program-for-georgian-cinema-has-been-launched&quot;,
            &quot;featured_image&quot;: null,
            &quot;is_published&quot;: true,
            &quot;published_at&quot;: &quot;2025-06-05T20:52:36.000000Z&quot;,
            &quot;views_count&quot;: 478,
            &quot;created_at&quot;: &quot;2025-06-20T20:51:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-20T20:52:36.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;title&quot;: {
                &quot;ka&quot;: &quot;თბილისში წიგნის საერთაშორისო ფესტივალი გაიხსნა&quot;,
                &quot;en&quot;: &quot;Tbilisi International Book Festival has opened&quot;
            },
            &quot;content&quot;: {
                &quot;ka&quot;: &quot;&lt;p&gt;დღეს, ექსპო ჯორჯიას საგამოფენო პავილიონებში თბილისის წიგნის საერთაშორისო ფესტივალი ოფიციალურად გაიხსნა. ფესტივალში 50-ზე მეტი გამომცემლობა და 20-მდე უცხოელი ავტორი მონაწილეობს. ფესტივალის ფარგლებში გაიმართება პრეზენტაციები, დისკუსიები და ვორქშოფები.&lt;/p&gt;&quot;,
                &quot;en&quot;: &quot;&lt;p&gt;Today, the Tbilisi International Book Festival was officially opened in the exhibition pavilions of Expo Georgia. More than 50 publishing houses and up to 20 foreign authors are participating in the festival. Presentations, discussions, and workshops will be held within the framework of the festival.&lt;/p&gt;&quot;
            },
            &quot;excerpt&quot;: {
                &quot;ka&quot;: &quot;ფესტივალში 50-ზე მეტი გამომცემლობა და 20-მდე უცხოელი ავტორი მონაწილეობს.&quot;,
                &quot;en&quot;: &quot;More than 50 publishing houses and up to 20 foreign authors are participating in the festival.&quot;
            },
            &quot;slug&quot;: &quot;tbilisi-international-book-festival-has-opened&quot;,
            &quot;featured_image&quot;: null,
            &quot;is_published&quot;: true,
            &quot;published_at&quot;: &quot;2025-05-31T20:52:36.000000Z&quot;,
            &quot;views_count&quot;: 1326,
            &quot;created_at&quot;: &quot;2025-06-20T20:51:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-20T20:52:36.000000Z&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: {
                &quot;ka&quot;: &quot;საქართველოს კულტურის სამინისტრო ციფრული ტრანსფორმაციის ახალ ეტაპზე გადადის&quot;,
                &quot;en&quot;: &quot;The Ministry of Culture of Georgia is entering a new stage of digital transformation&quot;
            },
            &quot;content&quot;: {
                &quot;ka&quot;: &quot;&lt;p&gt;საქართველოს კულტურის, სპორტისა და ახალგაზრდობის სამინისტრო აცხადებს, რომ იწყებს მასშტაბურ პროექტს, რომელიც მიზნად ისახავს კულტურული მემკვიდრეობის გაციფრულებას და თანამედროვე ტექნოლოგიების დანერგვას სამუზეუმო და საარქივო სივრცეებში. პროექტი მოიცავს ეროვნული მუზეუმის ექსპონატების 3D სკანირებას, ვირტუალური ტურების შექმნას და კულტურული ღონისძიებების ონლაინ პლატფორმის განვითარებას.&lt;/p&gt;&lt;p&gt;&bdquo;ჩვენი მიზანია, საქართველოს მდიდარი კულტურა ხელმისაწვდომი გავხადოთ მთელი მსოფლიოსთვის,&ldquo; - განაცხადა მინისტრმა.&lt;/p&gt;&quot;,
                &quot;en&quot;: &quot;&lt;p&gt;The Ministry of Culture, Sport and Youth of Georgia announces the launch of a large-scale project aimed at digitizing cultural heritage and introducing modern technologies in museums and archives. The project includes 3D scanning of exhibits from the National Museum, creating virtual tours, and developing an online platform for cultural events.&lt;/p&gt;&lt;p&gt;\&quot;Our goal is to make Georgia&#039;s rich culture accessible to the whole world,\&quot; said the Minister.&lt;/p&gt;&quot;
            },
            &quot;excerpt&quot;: {
                &quot;ka&quot;: &quot;სამინისტრო კულტურული მემკვიდრეობის გაციფრულების მასშტაბურ პროექტს იწყებს.&quot;,
                &quot;en&quot;: &quot;The Ministry is launching a large-scale project for the digitization of cultural heritage.&quot;
            },
            &quot;slug&quot;: &quot;the-ministry-of-culture-of-georgia-is-entering-a-new-stage-of-digital-transformation&quot;,
            &quot;featured_image&quot;: null,
            &quot;is_published&quot;: true,
            &quot;published_at&quot;: &quot;2025-05-29T20:52:36.000000Z&quot;,
            &quot;views_count&quot;: 1420,
            &quot;created_at&quot;: &quot;2025-06-20T20:51:58.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-20T20:52:36.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-news-featured" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-news-featured"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-news-featured"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-news-featured" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-news-featured">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-news-featured" data-method="GET"
      data-path="api/v1/news/featured"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-news-featured', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-news-featured"
                    onclick="tryItOut('GETapi-v1-news-featured');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-news-featured"
                    onclick="cancelTryOut('GETapi-v1-news-featured');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-news-featured"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/news/featured</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-news-featured"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-news-featured"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-news--slug-">GET api/v1/news/{slug}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-news--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/news/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/news/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-news--slug-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\News].&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-news--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-news--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-news--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-news--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-news--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-news--slug-" data-method="GET"
      data-path="api/v1/news/{slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-news--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-news--slug-"
                    onclick="tryItOut('GETapi-v1-news--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-news--slug-"
                    onclick="cancelTryOut('GETapi-v1-news--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-news--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/news/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-news--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-news--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="slug"                data-endpoint="GETapi-v1-news--slug-"
               value="1"
               data-component="url">
    <br>
<p>The slug of the news. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-projects">GET api/v1/projects</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-projects">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/projects" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/projects"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-projects">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-projects" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-projects"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-projects"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-projects" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-projects">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-projects" data-method="GET"
      data-path="api/v1/projects"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-projects', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-projects"
                    onclick="tryItOut('GETapi-v1-projects');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-projects"
                    onclick="cancelTryOut('GETapi-v1-projects');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-projects"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/projects</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-projects"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-projects"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-projects-featured">GET api/v1/projects/featured</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-projects-featured">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/projects/featured" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/projects/featured"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-projects-featured">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-projects-featured" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-projects-featured"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-projects-featured"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-projects-featured" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-projects-featured">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-projects-featured" data-method="GET"
      data-path="api/v1/projects/featured"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-projects-featured', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-projects-featured"
                    onclick="tryItOut('GETapi-v1-projects-featured');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-projects-featured"
                    onclick="cancelTryOut('GETapi-v1-projects-featured');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-projects-featured"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/projects/featured</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-projects-featured"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-projects-featured"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-projects-statuses">GET api/v1/projects/statuses</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-projects-statuses">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/projects/statuses" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/projects/statuses"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-projects-statuses">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;active&quot;: &quot;Active&quot;,
        &quot;completed&quot;: &quot;Completed&quot;,
        &quot;planned&quot;: &quot;Planned&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-projects-statuses" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-projects-statuses"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-projects-statuses"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-projects-statuses" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-projects-statuses">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-projects-statuses" data-method="GET"
      data-path="api/v1/projects/statuses"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-projects-statuses', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-projects-statuses"
                    onclick="tryItOut('GETapi-v1-projects-statuses');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-projects-statuses"
                    onclick="cancelTryOut('GETapi-v1-projects-statuses');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-projects-statuses"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/projects/statuses</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-projects-statuses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-projects-statuses"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-projects--slug-">GET api/v1/projects/{slug}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-projects--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/projects/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/projects/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-projects--slug-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-projects--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-projects--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-projects--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-projects--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-projects--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-projects--slug-" data-method="GET"
      data-path="api/v1/projects/{slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-projects--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-projects--slug-"
                    onclick="tryItOut('GETapi-v1-projects--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-projects--slug-"
                    onclick="cancelTryOut('GETapi-v1-projects--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-projects--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/projects/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-projects--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-projects--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="slug"                data-endpoint="GETapi-v1-projects--slug-"
               value="1"
               data-component="url">
    <br>
<p>The slug of the project. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-competitions">GET api/v1/competitions</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-competitions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/competitions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/competitions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-competitions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;title&quot;: {
                &quot;ka&quot;: &quot;asdasd&quot;,
                &quot;en&quot;: &quot;asdasd&quot;
            },
            &quot;description&quot;: {
                &quot;ka&quot;: &quot;sadas&quot;,
                &quot;en&quot;: &quot;asdas&quot;
            },
            &quot;requirements&quot;: {
                &quot;ka&quot;: &quot;dasd&quot;,
                &quot;en&quot;: &quot;asdasd&quot;
            },
            &quot;slug&quot;: &quot;asdasda&quot;,
            &quot;application_deadline&quot;: null,
            &quot;start_date&quot;: null,
            &quot;end_date&quot;: null,
            &quot;featured_image&quot;: &quot;competition-images/01JY7J3H8PAW7TV8E6RDZD22SM.jpeg&quot;,
            &quot;is_active&quot;: true,
            &quot;created_at&quot;: &quot;2025-06-20T20:57:24.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-20T20:57:24.000000Z&quot;,
            &quot;content&quot;: {
                &quot;ka&quot;: &quot;&lt;p&gt;asdasd&lt;/p&gt;&quot;,
                &quot;en&quot;: &quot;&lt;p&gt;asdsad&lt;/p&gt;&quot;
            },
            &quot;category&quot;: &quot;arts&quot;,
            &quot;prize_amount&quot;: &quot;123.00&quot;,
            &quot;max_participants&quot;: 123,
            &quot;contact_email&quot;: &quot;asdasd@gmail.c&quot;,
            &quot;contact_phone&quot;: &quot;12321312&quot;,
            &quot;competition_start&quot;: &quot;2025-06-20T20:56:47.000000Z&quot;,
            &quot;competition_end&quot;: &quot;2025-06-20T20:56:47.000000Z&quot;,
            &quot;results_announcement&quot;: &quot;2025-06-20T20:56:47.000000Z&quot;,
            &quot;is_published&quot;: true,
            &quot;published_at&quot;: &quot;2025-06-20T20:56:47.000000Z&quot;,
            &quot;application_form&quot;: &quot;competition-forms/01JY7J3H8SGAGT6R9W94QJDYRR.pdf&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost:8000/api/v1/competitions?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost:8000/api/v1/competitions?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost:8000/api/v1/competitions?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost:8000/api/v1/competitions&quot;,
        &quot;per_page&quot;: 12,
        &quot;to&quot;: 1,
        &quot;total&quot;: 1
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-competitions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-competitions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-competitions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-competitions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-competitions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-competitions" data-method="GET"
      data-path="api/v1/competitions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-competitions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-competitions"
                    onclick="tryItOut('GETapi-v1-competitions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-competitions"
                    onclick="cancelTryOut('GETapi-v1-competitions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-competitions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/competitions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-competitions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-competitions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-competitions-active">GET api/v1/competitions/active</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-competitions-active">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/competitions/active" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/competitions/active"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-competitions-active">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-competitions-active" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-competitions-active"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-competitions-active"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-competitions-active" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-competitions-active">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-competitions-active" data-method="GET"
      data-path="api/v1/competitions/active"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-competitions-active', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-competitions-active"
                    onclick="tryItOut('GETapi-v1-competitions-active');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-competitions-active"
                    onclick="cancelTryOut('GETapi-v1-competitions-active');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-competitions-active"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/competitions/active</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-competitions-active"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-competitions-active"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-competitions--slug-">GET api/v1/competitions/{slug}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-competitions--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/competitions/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/competitions/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-competitions--slug-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;No query results for model [App\\Models\\Competition].&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-competitions--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-competitions--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-competitions--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-competitions--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-competitions--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-competitions--slug-" data-method="GET"
      data-path="api/v1/competitions/{slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-competitions--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-competitions--slug-"
                    onclick="tryItOut('GETapi-v1-competitions--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-competitions--slug-"
                    onclick="cancelTryOut('GETapi-v1-competitions--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-competitions--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/competitions/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-competitions--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-competitions--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="slug"                data-endpoint="GETapi-v1-competitions--slug-"
               value="1"
               data-component="url">
    <br>
<p>The slug of the competition. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-vacancies">GET api/v1/vacancies</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-vacancies">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/vacancies" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/vacancies"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-vacancies">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-vacancies" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-vacancies"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-vacancies"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-vacancies" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-vacancies">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-vacancies" data-method="GET"
      data-path="api/v1/vacancies"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-vacancies', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-vacancies"
                    onclick="tryItOut('GETapi-v1-vacancies');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-vacancies"
                    onclick="cancelTryOut('GETapi-v1-vacancies');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-vacancies"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/vacancies</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-vacancies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-vacancies"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-vacancies-active">GET api/v1/vacancies/active</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-vacancies-active">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/vacancies/active" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/vacancies/active"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-vacancies-active">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-vacancies-active" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-vacancies-active"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-vacancies-active"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-vacancies-active" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-vacancies-active">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-vacancies-active" data-method="GET"
      data-path="api/v1/vacancies/active"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-vacancies-active', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-vacancies-active"
                    onclick="tryItOut('GETapi-v1-vacancies-active');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-vacancies-active"
                    onclick="cancelTryOut('GETapi-v1-vacancies-active');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-vacancies-active"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/vacancies/active</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-vacancies-active"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-vacancies-active"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-vacancies--slug-">GET api/v1/vacancies/{slug}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-vacancies--slug-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/vacancies/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/vacancies/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-vacancies--slug-">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-vacancies--slug-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-vacancies--slug-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-vacancies--slug-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-vacancies--slug-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-vacancies--slug-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-vacancies--slug-" data-method="GET"
      data-path="api/v1/vacancies/{slug}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-vacancies--slug-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-vacancies--slug-"
                    onclick="tryItOut('GETapi-v1-vacancies--slug-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-vacancies--slug-"
                    onclick="cancelTryOut('GETapi-v1-vacancies--slug-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-vacancies--slug-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/vacancies/{slug}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-vacancies--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-vacancies--slug-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>slug</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="slug"                data-endpoint="GETapi-v1-vacancies--slug-"
               value="1"
               data-component="url">
    <br>
<p>The slug of the vacancy. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-legislation">GET api/v1/legislation</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-legislation">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/legislation" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/legislation"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-legislation">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: [],
    &quot;pagination&quot;: {
        &quot;current_page&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;per_page&quot;: 20,
        &quot;total&quot;: 0
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-legislation" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-legislation"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-legislation"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-legislation" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-legislation">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-legislation" data-method="GET"
      data-path="api/v1/legislation"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-legislation', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-legislation"
                    onclick="tryItOut('GETapi-v1-legislation');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-legislation"
                    onclick="cancelTryOut('GETapi-v1-legislation');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-legislation"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/legislation</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-legislation"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-legislation"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-legislation-categories">GET api/v1/legislation/categories</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-legislation-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/legislation/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/legislation/categories"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-legislation-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;law&quot;: &quot;Law&quot;,
        &quot;regulation&quot;: &quot;Regulation&quot;,
        &quot;decree&quot;: &quot;Decree&quot;,
        &quot;order&quot;: &quot;Order&quot;,
        &quot;resolution&quot;: &quot;Resolution&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-legislation-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-legislation-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-legislation-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-legislation-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-legislation-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-legislation-categories" data-method="GET"
      data-path="api/v1/legislation/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-legislation-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-legislation-categories"
                    onclick="tryItOut('GETapi-v1-legislation-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-legislation-categories"
                    onclick="cancelTryOut('GETapi-v1-legislation-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-legislation-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/legislation/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-legislation-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-legislation-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-legislation--id-">GET api/v1/legislation/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-legislation--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/legislation/11" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/legislation/11"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-legislation--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 11,
        &quot;document_type&quot;: &quot;Law&quot;,
        &quot;act_number&quot;: &quot;#2323&quot;,
        &quot;adoption_date&quot;: &quot;2025-06-22T00:00:00.000000Z&quot;,
        &quot;effective_date&quot;: &quot;2025-06-28T00:00:00.000000Z&quot;,
        &quot;download_count&quot;: 0,
        &quot;created_at&quot;: &quot;2025-06-20T21:08:58.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-20T21:08:58.000000Z&quot;,
        &quot;title&quot;: {
            &quot;ka&quot;: &quot;კანონმდებლობა&quot;,
            &quot;en&quot;: &quot;Legislation&quot;
        },
        &quot;description&quot;: {
            &quot;ka&quot;: &quot;&lt;p&gt;ასდსადსად&lt;/p&gt;&quot;,
            &quot;en&quot;: &quot;&lt;p&gt;sdadsadasd&lt;/p&gt;&quot;
        },
        &quot;content&quot;: {
            &quot;ka&quot;: &quot;&lt;p&gt;ასდსადსად&lt;/p&gt;&quot;,
            &quot;en&quot;: &quot;&lt;p&gt;asdsadsad&lt;/p&gt;&quot;
        },
        &quot;slug&quot;: &quot;sadsadsa&quot;,
        &quot;is_published&quot;: true,
        &quot;published_at&quot;: &quot;2025-06-20T21:08:05.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-legislation--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-legislation--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-legislation--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-legislation--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-legislation--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-legislation--id-" data-method="GET"
      data-path="api/v1/legislation/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-legislation--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-legislation--id-"
                    onclick="tryItOut('GETapi-v1-legislation--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-legislation--id-"
                    onclick="cancelTryOut('GETapi-v1-legislation--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-legislation--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/legislation/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-legislation--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-legislation--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-legislation--id-"
               value="11"
               data-component="url">
    <br>
<p>The ID of the legislation. Example: <code>11</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-v1-legislation--id--download">POST api/v1/legislation/{id}/download</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-legislation--id--download">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/legislation/11/download" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/legislation/11/download"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-legislation--id--download">
</span>
<span id="execution-results-POSTapi-v1-legislation--id--download" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-legislation--id--download"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-legislation--id--download"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-legislation--id--download" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-legislation--id--download">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-legislation--id--download" data-method="POST"
      data-path="api/v1/legislation/{id}/download"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-legislation--id--download', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-legislation--id--download"
                    onclick="tryItOut('POSTapi-v1-legislation--id--download');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-legislation--id--download"
                    onclick="cancelTryOut('POSTapi-v1-legislation--id--download');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-legislation--id--download"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/legislation/{id}/download</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-legislation--id--download"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-legislation--id--download"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="POSTapi-v1-legislation--id--download"
               value="11"
               data-component="url">
    <br>
<p>The ID of the legislation. Example: <code>11</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-subordinate-institutions">GET api/v1/subordinate-institutions</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-subordinate-institutions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/subordinate-institutions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/subordinate-institutions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-subordinate-institutions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: {
                &quot;ka&quot;: &quot;სსიპი მახარა&quot;,
                &quot;en&quot;: &quot;Subordinate Makhara&quot;
            },
            &quot;description&quot;: {
                &quot;ka&quot;: &quot;&lt;p&gt;სადასდსად&lt;/p&gt;&quot;,
                &quot;en&quot;: &quot;&lt;p&gt;asdsadsad&lt;/p&gt;&quot;
            },
            &quot;logo&quot;: &quot;institution-logos/01JY7K10TXT638DW105D3ACXGS.png&quot;,
            &quot;website_url&quot;: null,
            &quot;email&quot;: &quot;adsad@adsadsad.dsadas&quot;,
            &quot;phone&quot;: &quot;123213213213&quot;,
            &quot;address&quot;: &quot;სამტრედია&quot;,
            &quot;sort_order&quot;: 0,
            &quot;is_active&quot;: true,
            &quot;created_at&quot;: &quot;2025-06-20T21:13:30.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-20T21:14:24.000000Z&quot;,
            &quot;slug&quot;: &quot;21323&quot;,
            &quot;mission&quot;: {
                &quot;ka&quot;: &quot;ასდსადასდ&quot;,
                &quot;en&quot;: &quot;asdasd&quot;
            },
            &quot;vision&quot;: {
                &quot;ka&quot;: &quot;ასდსადსად&quot;,
                &quot;en&quot;: &quot;asdasd&quot;
            },
            &quot;type&quot;: &quot;library&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;director_name&quot;: &quot;ზაზა&quot;,
            &quot;establishment_year&quot;: &quot;1923&quot;,
            &quot;facebook&quot;: &quot;https://www.facebook.com/photo?fbid=1287570322733763&amp;set=a.488868739270596&quot;,
            &quot;instagram&quot;: &quot;https://www.facebook.com/photo?fbid=1287570322733763&amp;set=a.488868739270596&quot;,
            &quot;twitter&quot;: &quot;https://www.facebook.com/photo?fbid=1287570322733763&amp;set=a.488868739270596&quot;,
            &quot;featured_image&quot;: &quot;institution-images/01JY7K10V1MRAJT36Q5JFY14XN.png&quot;,
            &quot;is_published&quot;: true,
            &quot;is_featured&quot;: false,
            &quot;published_at&quot;: &quot;2025-06-20T21:09:33.000000Z&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-subordinate-institutions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-subordinate-institutions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-subordinate-institutions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-subordinate-institutions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-subordinate-institutions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-subordinate-institutions" data-method="GET"
      data-path="api/v1/subordinate-institutions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-subordinate-institutions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-subordinate-institutions"
                    onclick="tryItOut('GETapi-v1-subordinate-institutions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-subordinate-institutions"
                    onclick="cancelTryOut('GETapi-v1-subordinate-institutions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-subordinate-institutions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/subordinate-institutions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-subordinate-institutions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-subordinate-institutions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-subordinate-institutions--id-">GET api/v1/subordinate-institutions/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-subordinate-institutions--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/subordinate-institutions/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/subordinate-institutions/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-subordinate-institutions--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;success&quot;: true,
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: {
            &quot;ka&quot;: &quot;სსიპი მახარა&quot;,
            &quot;en&quot;: &quot;Subordinate Makhara&quot;
        },
        &quot;description&quot;: {
            &quot;ka&quot;: &quot;&lt;p&gt;სადასდსად&lt;/p&gt;&quot;,
            &quot;en&quot;: &quot;&lt;p&gt;asdsadsad&lt;/p&gt;&quot;
        },
        &quot;logo&quot;: &quot;institution-logos/01JY7K10TXT638DW105D3ACXGS.png&quot;,
        &quot;website_url&quot;: null,
        &quot;email&quot;: &quot;adsad@adsadsad.dsadas&quot;,
        &quot;phone&quot;: &quot;123213213213&quot;,
        &quot;address&quot;: &quot;სამტრედია&quot;,
        &quot;sort_order&quot;: 0,
        &quot;is_active&quot;: true,
        &quot;created_at&quot;: &quot;2025-06-20T21:13:30.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-20T21:14:24.000000Z&quot;,
        &quot;slug&quot;: &quot;21323&quot;,
        &quot;mission&quot;: {
            &quot;ka&quot;: &quot;ასდსადასდ&quot;,
            &quot;en&quot;: &quot;asdasd&quot;
        },
        &quot;vision&quot;: {
            &quot;ka&quot;: &quot;ასდსადსად&quot;,
            &quot;en&quot;: &quot;asdasd&quot;
        },
        &quot;type&quot;: &quot;library&quot;,
        &quot;status&quot;: &quot;active&quot;,
        &quot;director_name&quot;: &quot;ზაზა&quot;,
        &quot;establishment_year&quot;: &quot;1923&quot;,
        &quot;facebook&quot;: &quot;https://www.facebook.com/photo?fbid=1287570322733763&amp;set=a.488868739270596&quot;,
        &quot;instagram&quot;: &quot;https://www.facebook.com/photo?fbid=1287570322733763&amp;set=a.488868739270596&quot;,
        &quot;twitter&quot;: &quot;https://www.facebook.com/photo?fbid=1287570322733763&amp;set=a.488868739270596&quot;,
        &quot;featured_image&quot;: &quot;institution-images/01JY7K10V1MRAJT36Q5JFY14XN.png&quot;,
        &quot;is_published&quot;: true,
        &quot;is_featured&quot;: false,
        &quot;published_at&quot;: &quot;2025-06-20T21:09:33.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-subordinate-institutions--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-subordinate-institutions--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-subordinate-institutions--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-subordinate-institutions--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-subordinate-institutions--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-subordinate-institutions--id-" data-method="GET"
      data-path="api/v1/subordinate-institutions/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-subordinate-institutions--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-subordinate-institutions--id-"
                    onclick="tryItOut('GETapi-v1-subordinate-institutions--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-subordinate-institutions--id-"
                    onclick="cancelTryOut('GETapi-v1-subordinate-institutions--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-subordinate-institutions--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/subordinate-institutions/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-subordinate-institutions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-subordinate-institutions--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-v1-subordinate-institutions--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the subordinate institution. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-v1-settings">GET api/v1/settings</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-settings">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/settings" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/settings"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-settings">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;&quot;: null
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-settings" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-settings"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-settings"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-settings" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-settings">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-settings" data-method="GET"
      data-path="api/v1/settings"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-settings', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-settings"
                    onclick="tryItOut('GETapi-v1-settings');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-settings"
                    onclick="cancelTryOut('GETapi-v1-settings');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-settings"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/settings</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-settings"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-settings-all">GET api/v1/settings/all</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-settings-all">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/settings/all" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/settings/all"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-settings-all">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;&quot;: null
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-settings-all" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-settings-all"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-settings-all"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-settings-all" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-settings-all">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-settings-all" data-method="GET"
      data-path="api/v1/settings/all"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-settings-all', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-settings-all"
                    onclick="tryItOut('GETapi-v1-settings-all');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-settings-all"
                    onclick="cancelTryOut('GETapi-v1-settings-all');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-settings-all"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/settings/all</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-settings-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-settings-all"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-settings-contact">GET api/v1/settings/contact</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-settings-contact">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/settings/contact" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/settings/contact"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-settings-contact">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-settings-contact" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-settings-contact"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-settings-contact"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-settings-contact" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-settings-contact">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-settings-contact" data-method="GET"
      data-path="api/v1/settings/contact"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-settings-contact', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-settings-contact"
                    onclick="tryItOut('GETapi-v1-settings-contact');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-settings-contact"
                    onclick="cancelTryOut('GETapi-v1-settings-contact');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-settings-contact"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/settings/contact</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-settings-contact"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-settings-contact"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-v1-settings-social">GET api/v1/settings/social</h2>

<p>
</p>



<span id="example-requests-GETapi-v1-settings-social">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost:8000/api/v1/settings/social" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/settings/social"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-v1-settings-social">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: []
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-v1-settings-social" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-v1-settings-social"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-v1-settings-social"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-v1-settings-social" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-v1-settings-social">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-v1-settings-social" data-method="GET"
      data-path="api/v1/settings/social"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-v1-settings-social', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-v1-settings-social"
                    onclick="tryItOut('GETapi-v1-settings-social');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-v1-settings-social"
                    onclick="cancelTryOut('GETapi-v1-settings-social');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-v1-settings-social"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/v1/settings/social</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-v1-settings-social"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-v1-settings-social"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-v1-contact">POST api/v1/contact</h2>

<p>
</p>



<span id="example-requests-POSTapi-v1-contact">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost:8000/api/v1/contact" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost:8000/api/v1/contact"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-v1-contact">
</span>
<span id="execution-results-POSTapi-v1-contact" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-v1-contact"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-v1-contact"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-v1-contact" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-v1-contact">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-v1-contact" data-method="POST"
      data-path="api/v1/contact"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-v1-contact', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-v1-contact"
                    onclick="tryItOut('POSTapi-v1-contact');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-v1-contact"
                    onclick="cancelTryOut('POSTapi-v1-contact');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-v1-contact"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/v1/contact</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-v1-contact"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-v1-contact"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
