<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>FITSTORE API Documentation</title>

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
        var tryItOutBaseUrl = "http://127.0.0.1:8000";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.10.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.10.0.js") }}"></script>

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
                                                    <li class="tocify-item level-2" data-unique="endpoints-POSTapi-login">
                                <a href="#endpoints-POSTapi-login">POST api/login</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products">
                                <a href="#endpoints-GETapi-products">GET api/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-products--product_id-">
                                <a href="#endpoints-GETapi-products--product_id-">GET api/products/{product_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-categories">
                                <a href="#endpoints-GETapi-categories">GET api/categories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-categories--category_id-">
                                <a href="#endpoints-GETapi-categories--category_id-">GET api/categories/{category_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-giveaways">
                                <a href="#endpoints-GETapi-giveaways">GET api/giveaways</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-posts">
                                <a href="#endpoints-GETapi-posts">GET api/posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-posts--post_id-">
                                <a href="#endpoints-GETapi-posts--post_id-">GET api/posts/{post_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                                <a href="#endpoints-GETapi-user">GET api/user</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-orders">
                                <a href="#endpoints-GETapi-orders">GET api/orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-orders">
                                <a href="#endpoints-POSTapi-orders">POST api/orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-orders--order_id-">
                                <a href="#endpoints-GETapi-orders--order_id-">GET api/orders/{order_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-payments">
                                <a href="#endpoints-GETapi-payments">GET api/payments</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-payments">
                                <a href="#endpoints-POSTapi-payments">POST api/payments</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-vip-subscription">
                                <a href="#endpoints-GETapi-vip-subscription">GET api/vip-subscription</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-cart-items">
                                <a href="#endpoints-POSTapi-cart-items">POST api/cart/items</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-cart-items--cartItem_id-">
                                <a href="#endpoints-DELETEapi-cart-items--cartItem_id-">DELETE api/cart/items/{cartItem_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-products">
                                <a href="#endpoints-POSTapi-products">POST api/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-products--product_id-">
                                <a href="#endpoints-PUTapi-products--product_id-">PUT api/products/{product_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PATCHapi-products--product_id-">
                                <a href="#endpoints-PATCHapi-products--product_id-">PATCH api/products/{product_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-products--product_id-">
                                <a href="#endpoints-DELETEapi-products--product_id-">DELETE api/products/{product_id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-products">
                                <a href="#endpoints-GETapi-admin-products">GET api/admin/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-admin-products">
                                <a href="#endpoints-POSTapi-admin-products">POST api/admin/products</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-products--id-">
                                <a href="#endpoints-GETapi-admin-products--id-">GET api/admin/products/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-admin-products--id-">
                                <a href="#endpoints-PUTapi-admin-products--id-">PUT api/admin/products/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-admin-products--id-">
                                <a href="#endpoints-DELETEapi-admin-products--id-">DELETE api/admin/products/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-categories">
                                <a href="#endpoints-GETapi-admin-categories">GET api/admin/categories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-admin-categories">
                                <a href="#endpoints-POSTapi-admin-categories">POST api/admin/categories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-categories--id-">
                                <a href="#endpoints-GETapi-admin-categories--id-">GET api/admin/categories/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-admin-categories--id-">
                                <a href="#endpoints-PUTapi-admin-categories--id-">PUT api/admin/categories/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-admin-categories--id-">
                                <a href="#endpoints-DELETEapi-admin-categories--id-">DELETE api/admin/categories/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-orders">
                                <a href="#endpoints-GETapi-admin-orders">GET api/admin/orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-admin-orders">
                                <a href="#endpoints-POSTapi-admin-orders">POST api/admin/orders</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-orders--id-">
                                <a href="#endpoints-GETapi-admin-orders--id-">GET api/admin/orders/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-admin-orders--id-">
                                <a href="#endpoints-PUTapi-admin-orders--id-">PUT api/admin/orders/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-admin-orders--id-">
                                <a href="#endpoints-DELETEapi-admin-orders--id-">DELETE api/admin/orders/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-discounts">
                                <a href="#endpoints-GETapi-admin-discounts">GET api/admin/discounts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-admin-discounts">
                                <a href="#endpoints-POSTapi-admin-discounts">POST api/admin/discounts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-discounts--id-">
                                <a href="#endpoints-GETapi-admin-discounts--id-">GET api/admin/discounts/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-admin-discounts--id-">
                                <a href="#endpoints-PUTapi-admin-discounts--id-">PUT api/admin/discounts/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-admin-discounts--id-">
                                <a href="#endpoints-DELETEapi-admin-discounts--id-">DELETE api/admin/discounts/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-coupons">
                                <a href="#endpoints-GETapi-admin-coupons">GET api/admin/coupons</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-admin-coupons">
                                <a href="#endpoints-POSTapi-admin-coupons">POST api/admin/coupons</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-coupons--id-">
                                <a href="#endpoints-GETapi-admin-coupons--id-">GET api/admin/coupons/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-admin-coupons--id-">
                                <a href="#endpoints-PUTapi-admin-coupons--id-">PUT api/admin/coupons/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-admin-coupons--id-">
                                <a href="#endpoints-DELETEapi-admin-coupons--id-">DELETE api/admin/coupons/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-giveaways">
                                <a href="#endpoints-GETapi-admin-giveaways">GET api/admin/giveaways</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-admin-giveaways">
                                <a href="#endpoints-POSTapi-admin-giveaways">POST api/admin/giveaways</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-giveaways--id-">
                                <a href="#endpoints-GETapi-admin-giveaways--id-">GET api/admin/giveaways/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-admin-giveaways--id-">
                                <a href="#endpoints-PUTapi-admin-giveaways--id-">PUT api/admin/giveaways/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-admin-giveaways--id-">
                                <a href="#endpoints-DELETEapi-admin-giveaways--id-">DELETE api/admin/giveaways/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-posts">
                                <a href="#endpoints-GETapi-admin-posts">GET api/admin/posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-admin-posts">
                                <a href="#endpoints-POSTapi-admin-posts">POST api/admin/posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-posts--id-">
                                <a href="#endpoints-GETapi-admin-posts--id-">GET api/admin/posts/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-admin-posts--id-">
                                <a href="#endpoints-PUTapi-admin-posts--id-">PUT api/admin/posts/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-admin-posts--id-">
                                <a href="#endpoints-DELETEapi-admin-posts--id-">DELETE api/admin/posts/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-documents">
                                <a href="#endpoints-GETapi-admin-documents">GET api/admin/documents</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-admin-documents">
                                <a href="#endpoints-POSTapi-admin-documents">POST api/admin/documents</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-admin-documents--id-">
                                <a href="#endpoints-GETapi-admin-documents--id-">GET api/admin/documents/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-PUTapi-admin-documents--id-">
                                <a href="#endpoints-PUTapi-admin-documents--id-">PUT api/admin/documents/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-DELETEapi-admin-documents--id-">
                                <a href="#endpoints-DELETEapi-admin-documents--id-">DELETE api/admin/documents/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe âœ</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: June 2, 2026</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://127.0.0.1:8000</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-POSTapi-login">POST api/login</h2>

<p>
</p>



<span id="example-requests-POSTapi-login">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/login" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"email\": \"gbailey@example.net\",
    \"password\": \"|]|{+-\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/login"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "email": "gbailey@example.net",
    "password": "|]|{+-"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-login">
</span>
<span id="execution-results-POSTapi-login" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-login"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-login"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-login">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-login" data-method="POST"
      data-path="api/login"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-login', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-login"
                    onclick="tryItOut('POSTapi-login');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-login"
                    onclick="cancelTryOut('POSTapi-login');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-login"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/login</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-login"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-login"
               value="gbailey@example.net"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>gbailey@example.net</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>password</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="password"                data-endpoint="POSTapi-login"
               value="|]|{+-"
               data-component="body">
    <br>
<p>Example: <code>|]|{+-</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-products">GET api/products</h2>

<p>
</p>



<span id="example-requests-GETapi-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/products"
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

<span id="example-responses-GETapi-products">
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
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Whey Protein Chocolate&quot;,
                &quot;slug&quot;: &quot;whey-protein-chocolate&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Whey Protein Chocolate is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;9.85&quot;,
                &quot;sale_price&quot;: &quot;8.37&quot;,
                &quot;stock&quot;: 35,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: true,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 1,
                &quot;brand_id&quot;: 2,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Supplements&quot;,
                    &quot;slug&quot;: &quot;supplements&quot;,
                    &quot;description&quot;: &quot;Premium supplements for active people.&quot;,
                    &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Supplements&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;deleted_at&quot;: null
                },
                &quot;brand&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;PowerFuel&quot;,
                    &quot;slug&quot;: &quot;powerfuel&quot;,
                    &quot;description&quot;: &quot;PowerFuel is a ejemplo brand created for the FITSTORE catalog.&quot;,
                    &quot;logo&quot;: &quot;https://placehold.co/500x220/ffffff/111827?text=PowerFuel&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;
                },
                &quot;main_image&quot;: {
                    &quot;id&quot;: 1,
                    &quot;product_id&quot;: 1,
                    &quot;image_path&quot;: &quot;https://placehold.co/900x900/f8fafc/111827?text=Whey+Protein+Chocolate&quot;,
                    &quot;alt_text&quot;: &quot;Whey Protein Chocolate&quot;,
                    &quot;is_main&quot;: true,
                    &quot;sort_order&quot;: 0,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Whey Protein Vanilla&quot;,
                &quot;slug&quot;: &quot;whey-protein-vanilla&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Whey Protein Vanilla is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;11.70&quot;,
                &quot;sale_price&quot;: null,
                &quot;stock&quot;: 41,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 1,
                &quot;brand_id&quot;: 3,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Supplements&quot;,
                    &quot;slug&quot;: &quot;supplements&quot;,
                    &quot;description&quot;: &quot;Premium supplements for active people.&quot;,
                    &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Supplements&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;deleted_at&quot;: null
                },
                &quot;brand&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;IronLab&quot;,
                    &quot;slug&quot;: &quot;ironlab&quot;,
                    &quot;description&quot;: &quot;IronLab is a ejemplo brand created for the FITSTORE catalog.&quot;,
                    &quot;logo&quot;: &quot;https://placehold.co/500x220/ffffff/111827?text=IronLab&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;
                },
                &quot;main_image&quot;: {
                    &quot;id&quot;: 3,
                    &quot;product_id&quot;: 2,
                    &quot;image_path&quot;: &quot;https://placehold.co/900x900/f8fafc/111827?text=Whey+Protein+Vanilla&quot;,
                    &quot;alt_text&quot;: &quot;Whey Protein Vanilla&quot;,
                    &quot;is_main&quot;: true,
                    &quot;sort_order&quot;: 0,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Multivitamin Complex&quot;,
                &quot;slug&quot;: &quot;multivitamin-complex&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Multivitamin Complex is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;13.55&quot;,
                &quot;sale_price&quot;: null,
                &quot;stock&quot;: 47,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 1,
                &quot;brand_id&quot;: 4,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Supplements&quot;,
                    &quot;slug&quot;: &quot;supplements&quot;,
                    &quot;description&quot;: &quot;Premium supplements for active people.&quot;,
                    &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Supplements&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;deleted_at&quot;: null
                },
                &quot;brand&quot;: {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;ActiveWear&quot;,
                    &quot;slug&quot;: &quot;activewear&quot;,
                    &quot;description&quot;: &quot;ActiveWear is a ejemplo brand created for the FITSTORE catalog.&quot;,
                    &quot;logo&quot;: &quot;https://placehold.co/500x220/ffffff/111827?text=ActiveWear&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;
                },
                &quot;main_image&quot;: {
                    &quot;id&quot;: 5,
                    &quot;product_id&quot;: 3,
                    &quot;image_path&quot;: &quot;https://placehold.co/900x900/f8fafc/111827?text=Multivitamin+Complex&quot;,
                    &quot;alt_text&quot;: &quot;Multivitamin Complex&quot;,
                    &quot;is_main&quot;: true,
                    &quot;sort_order&quot;: 0,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Omega 3 Capsules&quot;,
                &quot;slug&quot;: &quot;omega-3-capsules&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Omega 3 Capsules is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;15.40&quot;,
                &quot;sale_price&quot;: &quot;13.09&quot;,
                &quot;stock&quot;: 53,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: true,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 1,
                &quot;brand_id&quot;: 5,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Supplements&quot;,
                    &quot;slug&quot;: &quot;supplements&quot;,
                    &quot;description&quot;: &quot;Premium supplements for active people.&quot;,
                    &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Supplements&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;deleted_at&quot;: null
                },
                &quot;brand&quot;: {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;GymCore&quot;,
                    &quot;slug&quot;: &quot;gymcore&quot;,
                    &quot;description&quot;: &quot;GymCore is a ejemplo brand created for the FITSTORE catalog.&quot;,
                    &quot;logo&quot;: &quot;https://placehold.co/500x220/ffffff/111827?text=GymCore&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;
                },
                &quot;main_image&quot;: {
                    &quot;id&quot;: 7,
                    &quot;product_id&quot;: 4,
                    &quot;image_path&quot;: &quot;https://placehold.co/900x900/f8fafc/111827?text=Omega+3+Capsules&quot;,
                    &quot;alt_text&quot;: &quot;Omega 3 Capsules&quot;,
                    &quot;is_main&quot;: true,
                    &quot;sort_order&quot;: 0,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Pre Workout Energy&quot;,
                &quot;slug&quot;: &quot;pre-workout-energy&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Pre Workout Energy is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;17.25&quot;,
                &quot;sale_price&quot;: null,
                &quot;stock&quot;: 59,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 1,
                &quot;brand_id&quot;: 6,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Supplements&quot;,
                    &quot;slug&quot;: &quot;supplements&quot;,
                    &quot;description&quot;: &quot;Premium supplements for active people.&quot;,
                    &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Supplements&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;deleted_at&quot;: null
                },
                &quot;brand&quot;: {
                    &quot;id&quot;: 6,
                    &quot;name&quot;: &quot;PureFit&quot;,
                    &quot;slug&quot;: &quot;purefit&quot;,
                    &quot;description&quot;: &quot;PureFit is a ejemplo brand created for the FITSTORE catalog.&quot;,
                    &quot;logo&quot;: &quot;https://placehold.co/500x220/ffffff/111827?text=PureFit&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;
                },
                &quot;main_image&quot;: {
                    &quot;id&quot;: 9,
                    &quot;product_id&quot;: 5,
                    &quot;image_path&quot;: &quot;https://placehold.co/900x900/f8fafc/111827?text=Pre+Workout+Energy&quot;,
                    &quot;alt_text&quot;: &quot;Pre Workout Energy&quot;,
                    &quot;is_main&quot;: true,
                    &quot;sort_order&quot;: 0,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;BCAA Recovery Drink&quot;,
                &quot;slug&quot;: &quot;bcaa-recovery-drink&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;BCAA Recovery Drink is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;19.10&quot;,
                &quot;sale_price&quot;: null,
                &quot;stock&quot;: 65,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 1,
                &quot;brand_id&quot;: null,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Supplements&quot;,
                    &quot;slug&quot;: &quot;supplements&quot;,
                    &quot;description&quot;: &quot;Premium supplements for active people.&quot;,
                    &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Supplements&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;deleted_at&quot;: null
                },
                &quot;brand&quot;: null,
                &quot;main_image&quot;: {
                    &quot;id&quot;: 11,
                    &quot;product_id&quot;: 6,
                    &quot;image_path&quot;: &quot;https://placehold.co/900x900/f8fafc/111827?text=BCAA+Recovery+Drink&quot;,
                    &quot;alt_text&quot;: &quot;BCAA Recovery Drink&quot;,
                    &quot;is_main&quot;: true,
                    &quot;sort_order&quot;: 0,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Peanut Butter Natural&quot;,
                &quot;slug&quot;: &quot;peanut-butter-natural&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Peanut Butter Natural is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;20.95&quot;,
                &quot;sale_price&quot;: &quot;17.81&quot;,
                &quot;stock&quot;: 35,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: true,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 2,
                &quot;brand_id&quot;: 2,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Fit Food&quot;,
                    &quot;slug&quot;: &quot;fit-food&quot;,
                    &quot;description&quot;: &quot;Premium fit food for active people.&quot;,
                    &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Fit+Food&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;deleted_at&quot;: null
                },
                &quot;brand&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;PowerFuel&quot;,
                    &quot;slug&quot;: &quot;powerfuel&quot;,
                    &quot;description&quot;: &quot;PowerFuel is a ejemplo brand created for the FITSTORE catalog.&quot;,
                    &quot;logo&quot;: &quot;https://placehold.co/500x220/ffffff/111827?text=PowerFuel&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;
                },
                &quot;main_image&quot;: {
                    &quot;id&quot;: 13,
                    &quot;product_id&quot;: 7,
                    &quot;image_path&quot;: &quot;https://placehold.co/900x900/f8fafc/111827?text=Peanut+Butter+Natural&quot;,
                    &quot;alt_text&quot;: &quot;Peanut Butter Natural&quot;,
                    &quot;is_main&quot;: true,
                    &quot;sort_order&quot;: 0,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 8,
                &quot;name&quot;: &quot;Oat Flour Chocolate&quot;,
                &quot;slug&quot;: &quot;oat-flour-chocolate&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Oat Flour Chocolate is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;22.80&quot;,
                &quot;sale_price&quot;: null,
                &quot;stock&quot;: 41,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: true,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 2,
                &quot;brand_id&quot;: 3,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Fit Food&quot;,
                    &quot;slug&quot;: &quot;fit-food&quot;,
                    &quot;description&quot;: &quot;Premium fit food for active people.&quot;,
                    &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Fit+Food&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;deleted_at&quot;: null
                },
                &quot;brand&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;IronLab&quot;,
                    &quot;slug&quot;: &quot;ironlab&quot;,
                    &quot;description&quot;: &quot;IronLab is a ejemplo brand created for the FITSTORE catalog.&quot;,
                    &quot;logo&quot;: &quot;https://placehold.co/500x220/ffffff/111827?text=IronLab&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;
                },
                &quot;main_image&quot;: {
                    &quot;id&quot;: 15,
                    &quot;product_id&quot;: 8,
                    &quot;image_path&quot;: &quot;https://placehold.co/900x900/f8fafc/111827?text=Oat+Flour+Chocolate&quot;,
                    &quot;alt_text&quot;: &quot;Oat Flour Chocolate&quot;,
                    &quot;is_main&quot;: true,
                    &quot;sort_order&quot;: 0,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 9,
                &quot;name&quot;: &quot;Protein Pancake Mix&quot;,
                &quot;slug&quot;: &quot;protein-pancake-mix&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Protein Pancake Mix is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;24.65&quot;,
                &quot;sale_price&quot;: null,
                &quot;stock&quot;: 47,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 2,
                &quot;brand_id&quot;: 4,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Fit Food&quot;,
                    &quot;slug&quot;: &quot;fit-food&quot;,
                    &quot;description&quot;: &quot;Premium fit food for active people.&quot;,
                    &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Fit+Food&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;deleted_at&quot;: null
                },
                &quot;brand&quot;: {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;ActiveWear&quot;,
                    &quot;slug&quot;: &quot;activewear&quot;,
                    &quot;description&quot;: &quot;ActiveWear is a ejemplo brand created for the FITSTORE catalog.&quot;,
                    &quot;logo&quot;: &quot;https://placehold.co/500x220/ffffff/111827?text=ActiveWear&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;
                },
                &quot;main_image&quot;: {
                    &quot;id&quot;: 17,
                    &quot;product_id&quot;: 9,
                    &quot;image_path&quot;: &quot;https://placehold.co/900x900/f8fafc/111827?text=Protein+Pancake+Mix&quot;,
                    &quot;alt_text&quot;: &quot;Protein Pancake Mix&quot;,
                    &quot;is_main&quot;: true,
                    &quot;sort_order&quot;: 0,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 10,
                &quot;name&quot;: &quot;Zero Sauce Barbecue&quot;,
                &quot;slug&quot;: &quot;zero-sauce-barbecue&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Zero Sauce Barbecue is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;26.50&quot;,
                &quot;sale_price&quot;: &quot;22.53&quot;,
                &quot;stock&quot;: 53,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 2,
                &quot;brand_id&quot;: 5,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Fit Food&quot;,
                    &quot;slug&quot;: &quot;fit-food&quot;,
                    &quot;description&quot;: &quot;Premium fit food for active people.&quot;,
                    &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Fit+Food&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;deleted_at&quot;: null
                },
                &quot;brand&quot;: {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;GymCore&quot;,
                    &quot;slug&quot;: &quot;gymcore&quot;,
                    &quot;description&quot;: &quot;GymCore is a ejemplo brand created for the FITSTORE catalog.&quot;,
                    &quot;logo&quot;: &quot;https://placehold.co/500x220/ffffff/111827?text=GymCore&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;
                },
                &quot;main_image&quot;: {
                    &quot;id&quot;: 19,
                    &quot;product_id&quot;: 10,
                    &quot;image_path&quot;: &quot;https://placehold.co/900x900/f8fafc/111827?text=Zero+Sauce+Barbecue&quot;,
                    &quot;alt_text&quot;: &quot;Zero Sauce Barbecue&quot;,
                    &quot;is_main&quot;: true,
                    &quot;sort_order&quot;: 0,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 11,
                &quot;name&quot;: &quot;Rice Cream Vanilla&quot;,
                &quot;slug&quot;: &quot;rice-cream-vanilla&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Rice Cream Vanilla is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;28.35&quot;,
                &quot;sale_price&quot;: null,
                &quot;stock&quot;: 59,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 2,
                &quot;brand_id&quot;: 6,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Fit Food&quot;,
                    &quot;slug&quot;: &quot;fit-food&quot;,
                    &quot;description&quot;: &quot;Premium fit food for active people.&quot;,
                    &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Fit+Food&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;deleted_at&quot;: null
                },
                &quot;brand&quot;: {
                    &quot;id&quot;: 6,
                    &quot;name&quot;: &quot;PureFit&quot;,
                    &quot;slug&quot;: &quot;purefit&quot;,
                    &quot;description&quot;: &quot;PureFit is a ejemplo brand created for the FITSTORE catalog.&quot;,
                    &quot;logo&quot;: &quot;https://placehold.co/500x220/ffffff/111827?text=PureFit&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;
                },
                &quot;main_image&quot;: {
                    &quot;id&quot;: 21,
                    &quot;product_id&quot;: 11,
                    &quot;image_path&quot;: &quot;https://placehold.co/900x900/f8fafc/111827?text=Rice+Cream+Vanilla&quot;,
                    &quot;alt_text&quot;: &quot;Rice Cream Vanilla&quot;,
                    &quot;is_main&quot;: true,
                    &quot;sort_order&quot;: 0,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 12,
                &quot;name&quot;: &quot;Almond Cream&quot;,
                &quot;slug&quot;: &quot;almond-cream&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Almond Cream is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;30.20&quot;,
                &quot;sale_price&quot;: null,
                &quot;stock&quot;: 65,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: true,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 2,
                &quot;brand_id&quot;: null,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;Fit Food&quot;,
                    &quot;slug&quot;: &quot;fit-food&quot;,
                    &quot;description&quot;: &quot;Premium fit food for active people.&quot;,
                    &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Fit+Food&quot;,
                    &quot;status&quot;: &quot;active&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                    &quot;deleted_at&quot;: null
                },
                &quot;brand&quot;: null,
                &quot;main_image&quot;: {
                    &quot;id&quot;: 23,
                    &quot;product_id&quot;: 12,
                    &quot;image_path&quot;: &quot;https://placehold.co/900x900/f8fafc/111827?text=Almond+Cream&quot;,
                    &quot;alt_text&quot;: &quot;Almond Cream&quot;,
                    &quot;is_main&quot;: true,
                    &quot;sort_order&quot;: 0,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
                }
            }
        ],
        &quot;first_page_url&quot;: &quot;http://127.0.0.1:8000/api/products?page=1&quot;,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 4,
        &quot;last_page_url&quot;: &quot;http://127.0.0.1:8000/api/products?page=4&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/products?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/products?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/products?page=3&quot;,
                &quot;label&quot;: &quot;3&quot;,
                &quot;page&quot;: 3,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/products?page=4&quot;,
                &quot;label&quot;: &quot;4&quot;,
                &quot;page&quot;: 4,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/products?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: 2,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: &quot;http://127.0.0.1:8000/api/products?page=2&quot;,
        &quot;path&quot;: &quot;http://127.0.0.1:8000/api/products&quot;,
        &quot;per_page&quot;: 12,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: 12,
        &quot;total&quot;: 42
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products" data-method="GET"
      data-path="api/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products"
                    onclick="tryItOut('GETapi-products');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products"
                    onclick="cancelTryOut('GETapi-products');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-products--product_id-">GET api/products/{product_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-products--product_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/products/1"
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

<span id="example-responses-GETapi-products--product_id-">
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
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Whey Protein Chocolate&quot;,
        &quot;slug&quot;: &quot;whey-protein-chocolate&quot;,
        &quot;description&quot;: &quot;&lt;p&gt;Whey Protein Chocolate is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
        &quot;price&quot;: &quot;9.85&quot;,
        &quot;sale_price&quot;: &quot;8.37&quot;,
        &quot;stock&quot;: 35,
        &quot;status&quot;: &quot;active&quot;,
        &quot;is_featured&quot;: true,
        &quot;is_vip_exclusive&quot;: false,
        &quot;category_id&quot;: 1,
        &quot;brand_id&quot;: 2,
        &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Supplements&quot;,
            &quot;slug&quot;: &quot;supplements&quot;,
            &quot;description&quot;: &quot;Premium supplements for active people.&quot;,
            &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Supplements&quot;,
            &quot;status&quot;: &quot;active&quot;,
            &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
            &quot;deleted_at&quot;: null
        },
        &quot;brand&quot;: {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;PowerFuel&quot;,
            &quot;slug&quot;: &quot;powerfuel&quot;,
            &quot;description&quot;: &quot;PowerFuel is a ejemplo brand created for the FITSTORE catalog.&quot;,
            &quot;logo&quot;: &quot;https://placehold.co/500x220/ffffff/111827?text=PowerFuel&quot;,
            &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;
        },
        &quot;images&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;product_id&quot;: 1,
                &quot;image_path&quot;: &quot;https://placehold.co/900x900/f8fafc/111827?text=Whey+Protein+Chocolate&quot;,
                &quot;alt_text&quot;: &quot;Whey Protein Chocolate&quot;,
                &quot;is_main&quot;: true,
                &quot;sort_order&quot;: 0,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;product_id&quot;: 1,
                &quot;image_path&quot;: &quot;https://placehold.co/900x900/111827/ffffff?text=FITSTORE+1&quot;,
                &quot;alt_text&quot;: &quot;Whey Protein Chocolate detail&quot;,
                &quot;is_main&quot;: false,
                &quot;sort_order&quot;: 1,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
            }
        ],
        &quot;variants&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;product_id&quot;: 1,
                &quot;size&quot;: null,
                &quot;color&quot;: null,
                &quot;flavor&quot;: &quot;Chocolate&quot;,
                &quot;weight&quot;: &quot;1kg&quot;,
                &quot;extra_price&quot;: &quot;0.00&quot;,
                &quot;stock&quot;: 18,
                &quot;sku&quot;: &quot;FS-1-CHO&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
            },
            {
                &quot;id&quot;: 2,
                &quot;product_id&quot;: 1,
                &quot;size&quot;: null,
                &quot;color&quot;: null,
                &quot;flavor&quot;: &quot;Vanilla&quot;,
                &quot;weight&quot;: &quot;1kg&quot;,
                &quot;extra_price&quot;: &quot;1.50&quot;,
                &quot;stock&quot;: 18,
                &quot;sku&quot;: &quot;FS-1-VAN&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:14.000000Z&quot;
            }
        ],
        &quot;tags&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Protein&quot;,
                &quot;slug&quot;: &quot;protein&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;pivot&quot;: {
                    &quot;product_id&quot;: 1,
                    &quot;tag_id&quot;: 1,
                    &quot;priority&quot;: 1,
                    &quot;is_visible&quot;: 1,
                    &quot;created_at&quot;: &quot;2026-05-19T13:25:05.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-19T13:25:05.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Energy&quot;,
                &quot;slug&quot;: &quot;energy&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;pivot&quot;: {
                    &quot;product_id&quot;: 1,
                    &quot;tag_id&quot;: 2,
                    &quot;priority&quot;: 2,
                    &quot;is_visible&quot;: 1,
                    &quot;created_at&quot;: &quot;2026-05-19T13:25:05.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-19T13:25:05.000000Z&quot;
                }
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-products--product_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-products--product_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-products--product_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-products--product_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-products--product_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-products--product_id-" data-method="GET"
      data-path="api/products/{product_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-products--product_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-products--product_id-"
                    onclick="tryItOut('GETapi-products--product_id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-products--product_id-"
                    onclick="cancelTryOut('GETapi-products--product_id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-products--product_id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/products/{product_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="GETapi-products--product_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-categories">GET api/categories</h2>

<p>
</p>



<span id="example-requests-GETapi-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/categories"
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

<span id="example-responses-GETapi-categories">
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
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Supplements&quot;,
                &quot;slug&quot;: &quot;supplements&quot;,
                &quot;description&quot;: &quot;Premium supplements for active people.&quot;,
                &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Supplements&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Fit Food&quot;,
                &quot;slug&quot;: &quot;fit-food&quot;,
                &quot;description&quot;: &quot;Premium fit food for active people.&quot;,
                &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Fit+Food&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Protein Bars&quot;,
                &quot;slug&quot;: &quot;protein-bars&quot;,
                &quot;description&quot;: &quot;Premium protein bars for active people.&quot;,
                &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Protein+Bars&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Creatine&quot;,
                &quot;slug&quot;: &quot;creatine&quot;,
                &quot;description&quot;: &quot;Premium creatine for active people.&quot;,
                &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Creatine&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Men Clothing&quot;,
                &quot;slug&quot;: &quot;men-clothing&quot;,
                &quot;description&quot;: &quot;Premium men clothing for active people.&quot;,
                &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Men+Clothing&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;Women Clothing&quot;,
                &quot;slug&quot;: &quot;women-clothing&quot;,
                &quot;description&quot;: &quot;Premium women clothing for active people.&quot;,
                &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Women+Clothing&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Accessories&quot;,
                &quot;slug&quot;: &quot;accessories&quot;,
                &quot;description&quot;: &quot;Premium accessories for active people.&quot;,
                &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Accessories&quot;,
                &quot;status&quot;: &quot;active&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null
            }
        ],
        &quot;first_page_url&quot;: &quot;http://127.0.0.1:8000/api/categories?page=1&quot;,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;last_page_url&quot;: &quot;http://127.0.0.1:8000/api/categories?page=1&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/categories?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: null,
        &quot;path&quot;: &quot;http://127.0.0.1:8000/api/categories&quot;,
        &quot;per_page&quot;: 12,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: 7,
        &quot;total&quot;: 7
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-categories" data-method="GET"
      data-path="api/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories"
                    onclick="tryItOut('GETapi-categories');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories"
                    onclick="cancelTryOut('GETapi-categories');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-categories--category_id-">GET api/categories/{category_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-categories--category_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/categories/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/categories/1"
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

<span id="example-responses-GETapi-categories--category_id-">
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
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Supplements&quot;,
        &quot;slug&quot;: &quot;supplements&quot;,
        &quot;description&quot;: &quot;Premium supplements for active people.&quot;,
        &quot;image&quot;: &quot;https://placehold.co/1000x700/111827/ffffff?text=Supplements&quot;,
        &quot;status&quot;: &quot;active&quot;,
        &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
        &quot;deleted_at&quot;: null,
        &quot;products&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;name&quot;: &quot;Whey Protein Chocolate&quot;,
                &quot;slug&quot;: &quot;whey-protein-chocolate&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Whey Protein Chocolate is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;9.85&quot;,
                &quot;sale_price&quot;: &quot;8.37&quot;,
                &quot;stock&quot;: 35,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: true,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 1,
                &quot;brand_id&quot;: 2,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;Whey Protein Vanilla&quot;,
                &quot;slug&quot;: &quot;whey-protein-vanilla&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Whey Protein Vanilla is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;11.70&quot;,
                &quot;sale_price&quot;: null,
                &quot;stock&quot;: 41,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 1,
                &quot;brand_id&quot;: 3,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 3,
                &quot;name&quot;: &quot;Multivitamin Complex&quot;,
                &quot;slug&quot;: &quot;multivitamin-complex&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Multivitamin Complex is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;13.55&quot;,
                &quot;sale_price&quot;: null,
                &quot;stock&quot;: 47,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 1,
                &quot;brand_id&quot;: 4,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 4,
                &quot;name&quot;: &quot;Omega 3 Capsules&quot;,
                &quot;slug&quot;: &quot;omega-3-capsules&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Omega 3 Capsules is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;15.40&quot;,
                &quot;sale_price&quot;: &quot;13.09&quot;,
                &quot;stock&quot;: 53,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: true,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 1,
                &quot;brand_id&quot;: 5,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;Pre Workout Energy&quot;,
                &quot;slug&quot;: &quot;pre-workout-energy&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;Pre Workout Energy is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;17.25&quot;,
                &quot;sale_price&quot;: null,
                &quot;stock&quot;: 59,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 1,
                &quot;brand_id&quot;: 6,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null
            },
            {
                &quot;id&quot;: 6,
                &quot;name&quot;: &quot;BCAA Recovery Drink&quot;,
                &quot;slug&quot;: &quot;bcaa-recovery-drink&quot;,
                &quot;description&quot;: &quot;&lt;p&gt;BCAA Recovery Drink is a ejemplo FITSTORE product with a clean description, simple benefits and a student-friendly ecommerce structure.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Good quality&lt;/li&gt;&lt;li&gt;Fast shipping&lt;/li&gt;&lt;li&gt;Prepared for variants and discounts&lt;/li&gt;&lt;/ul&gt;&quot;,
                &quot;price&quot;: &quot;19.10&quot;,
                &quot;sale_price&quot;: null,
                &quot;stock&quot;: 65,
                &quot;status&quot;: &quot;active&quot;,
                &quot;is_featured&quot;: false,
                &quot;is_vip_exclusive&quot;: false,
                &quot;category_id&quot;: 1,
                &quot;brand_id&quot;: null,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;deleted_at&quot;: null
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories--category_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories--category_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories--category_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categories--category_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories--category_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-categories--category_id-" data-method="GET"
      data-path="api/categories/{category_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories--category_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories--category_id-"
                    onclick="tryItOut('GETapi-categories--category_id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories--category_id-"
                    onclick="cancelTryOut('GETapi-categories--category_id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories--category_id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories/{category_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-categories--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-categories--category_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>category_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="category_id"                data-endpoint="GETapi-categories--category_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-giveaways">GET api/giveaways</h2>

<p>
</p>



<span id="example-requests-GETapi-giveaways">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/giveaways" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/giveaways"
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

<span id="example-responses-GETapi-giveaways">
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

<code class="language-json" style="max-height: 300px;">[
    {
        &quot;id&quot;: 2,
        &quot;title&quot;: &quot;VIP Gym Backpack Giveaway&quot;,
        &quot;description&quot;: &quot;VIP customers can join this monthly giveaway.&quot;,
        &quot;prize&quot;: &quot;Premium backpack with accessories&quot;,
        &quot;start_date&quot;: &quot;2026-05-09T00:00:00.000000Z&quot;,
        &quot;end_date&quot;: &quot;2026-06-06T00:00:00.000000Z&quot;,
        &quot;status&quot;: &quot;active&quot;,
        &quot;winner_user_id&quot;: null,
        &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
        &quot;deleted_at&quot;: null,
        &quot;entries_count&quot;: 2
    },
    {
        &quot;id&quot;: 3,
        &quot;title&quot;: &quot;Creatine Bundle Giveaway&quot;,
        &quot;description&quot;: &quot;VIP customers can join this monthly giveaway.&quot;,
        &quot;prize&quot;: &quot;Creatine bundle for one month&quot;,
        &quot;start_date&quot;: &quot;2026-05-09T00:00:00.000000Z&quot;,
        &quot;end_date&quot;: &quot;2026-06-06T00:00:00.000000Z&quot;,
        &quot;status&quot;: &quot;active&quot;,
        &quot;winner_user_id&quot;: null,
        &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
        &quot;deleted_at&quot;: null,
        &quot;entries_count&quot;: 1
    }
]</code>
 </pre>
    </span>
<span id="execution-results-GETapi-giveaways" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-giveaways"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-giveaways"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-giveaways" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-giveaways">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-giveaways" data-method="GET"
      data-path="api/giveaways"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-giveaways', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-giveaways"
                    onclick="tryItOut('GETapi-giveaways');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-giveaways"
                    onclick="cancelTryOut('GETapi-giveaways');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-giveaways"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/giveaways</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-giveaways"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-giveaways"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-posts">GET api/posts</h2>

<p>
</p>



<span id="example-requests-GETapi-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/posts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/posts"
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

<span id="example-responses-GETapi-posts">
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
        &quot;current_page&quot;: 1,
        &quot;data&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;user_id&quot;: 3,
                &quot;post_category_id&quot;: 1,
                &quot;title&quot;: &quot;How to Choose the Right Protein&quot;,
                &quot;slug&quot;: &quot;how-to-choose-the-right-protein&quot;,
                &quot;excerpt&quot;: &quot;A simple FITSTORE article about how to choose the right protein.&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;This post is written for the FITSTORE blog. It includes practical advice, clear sections and a friendly ecommerce tone.&lt;/p&gt;&lt;p&gt;Students can edit this content from the admin dashboard using the WYSIWYG editor.&lt;/p&gt;&quot;,
                &quot;image&quot;: &quot;https://placehold.co/1200x700/111827/ffffff?text=How+to+Choose+the+Right+Protein&quot;,
                &quot;status&quot;: &quot;published&quot;,
                &quot;published_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Nutrition&quot;,
                    &quot;slug&quot;: &quot;nutrition&quot;,
                    &quot;description&quot;: &quot;Posts about nutrition&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                },
                &quot;tags&quot;: [
                    {
                        &quot;id&quot;: 5,
                        &quot;name&quot;: &quot;New&quot;,
                        &quot;slug&quot;: &quot;new&quot;,
                        &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;post_id&quot;: 1,
                            &quot;tag_id&quot;: 5,
                            &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 7,
                        &quot;name&quot;: &quot;Clothing&quot;,
                        &quot;slug&quot;: &quot;clothing&quot;,
                        &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;post_id&quot;: 1,
                            &quot;tag_id&quot;: 7,
                            &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                        }
                    }
                ]
            },
            {
                &quot;id&quot;: 2,
                &quot;user_id&quot;: 3,
                &quot;post_category_id&quot;: 3,
                &quot;title&quot;: &quot;Best Supplements for Beginners&quot;,
                &quot;slug&quot;: &quot;best-supplements-for-beginners&quot;,
                &quot;excerpt&quot;: &quot;A simple FITSTORE article about best supplements for beginners.&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;This post is written for the FITSTORE blog. It includes practical advice, clear sections and a friendly ecommerce tone.&lt;/p&gt;&lt;p&gt;Students can edit this content from the admin dashboard using the WYSIWYG editor.&lt;/p&gt;&quot;,
                &quot;image&quot;: &quot;https://placehold.co/1200x700/111827/ffffff?text=Best+Supplements+for+Beginners&quot;,
                &quot;status&quot;: &quot;published&quot;,
                &quot;published_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Supplements&quot;,
                    &quot;slug&quot;: &quot;supplements&quot;,
                    &quot;description&quot;: &quot;Posts about supplements&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                },
                &quot;tags&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Recovery&quot;,
                        &quot;slug&quot;: &quot;recovery&quot;,
                        &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;post_id&quot;: 2,
                            &quot;tag_id&quot;: 3,
                            &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 4,
                        &quot;name&quot;: &quot;Vegan&quot;,
                        &quot;slug&quot;: &quot;vegan&quot;,
                        &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;post_id&quot;: 2,
                            &quot;tag_id&quot;: 4,
                            &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                        }
                    }
                ]
            },
            {
                &quot;id&quot;: 3,
                &quot;user_id&quot;: 3,
                &quot;post_category_id&quot;: 1,
                &quot;title&quot;: &quot;Healthy Fitness Breakfast Ideas&quot;,
                &quot;slug&quot;: &quot;healthy-fitness-breakfast-ideas&quot;,
                &quot;excerpt&quot;: &quot;A simple FITSTORE article about healthy fitness breakfast ideas.&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;This post is written for the FITSTORE blog. It includes practical advice, clear sections and a friendly ecommerce tone.&lt;/p&gt;&lt;p&gt;Students can edit this content from the admin dashboard using the WYSIWYG editor.&lt;/p&gt;&quot;,
                &quot;image&quot;: &quot;https://placehold.co/1200x700/111827/ffffff?text=Healthy+Fitness+Breakfast+Ideas&quot;,
                &quot;status&quot;: &quot;published&quot;,
                &quot;published_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Nutrition&quot;,
                    &quot;slug&quot;: &quot;nutrition&quot;,
                    &quot;description&quot;: &quot;Posts about nutrition&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                },
                &quot;tags&quot;: [
                    {
                        &quot;id&quot;: 1,
                        &quot;name&quot;: &quot;Protein&quot;,
                        &quot;slug&quot;: &quot;protein&quot;,
                        &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;post_id&quot;: 3,
                            &quot;tag_id&quot;: 1,
                            &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Recovery&quot;,
                        &quot;slug&quot;: &quot;recovery&quot;,
                        &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;post_id&quot;: 3,
                            &quot;tag_id&quot;: 3,
                            &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                        }
                    }
                ]
            },
            {
                &quot;id&quot;: 4,
                &quot;user_id&quot;: 3,
                &quot;post_category_id&quot;: 3,
                &quot;title&quot;: &quot;Creatine Guide for Athletes&quot;,
                &quot;slug&quot;: &quot;creatine-guide-for-athletes&quot;,
                &quot;excerpt&quot;: &quot;A simple FITSTORE article about creatine guide for athletes.&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;This post is written for the FITSTORE blog. It includes practical advice, clear sections and a friendly ecommerce tone.&lt;/p&gt;&lt;p&gt;Students can edit this content from the admin dashboard using the WYSIWYG editor.&lt;/p&gt;&quot;,
                &quot;image&quot;: &quot;https://placehold.co/1200x700/111827/ffffff?text=Creatine+Guide+for+Athletes&quot;,
                &quot;status&quot;: &quot;published&quot;,
                &quot;published_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Supplements&quot;,
                    &quot;slug&quot;: &quot;supplements&quot;,
                    &quot;description&quot;: &quot;Posts about supplements&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                },
                &quot;tags&quot;: [
                    {
                        &quot;id&quot;: 3,
                        &quot;name&quot;: &quot;Recovery&quot;,
                        &quot;slug&quot;: &quot;recovery&quot;,
                        &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;post_id&quot;: 4,
                            &quot;tag_id&quot;: 3,
                            &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 5,
                        &quot;name&quot;: &quot;New&quot;,
                        &quot;slug&quot;: &quot;new&quot;,
                        &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;post_id&quot;: 4,
                            &quot;tag_id&quot;: 5,
                            &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                        }
                    }
                ]
            },
            {
                &quot;id&quot;: 5,
                &quot;user_id&quot;: 3,
                &quot;post_category_id&quot;: 4,
                &quot;title&quot;: &quot;VIP Monthly Giveaway Announcement&quot;,
                &quot;slug&quot;: &quot;vip-monthly-giveaway-announcement&quot;,
                &quot;excerpt&quot;: &quot;A simple FITSTORE article about vip monthly giveaway announcement.&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;This post is written for the FITSTORE blog. It includes practical advice, clear sections and a friendly ecommerce tone.&lt;/p&gt;&lt;p&gt;Students can edit this content from the admin dashboard using the WYSIWYG editor.&lt;/p&gt;&quot;,
                &quot;image&quot;: &quot;https://placehold.co/1200x700/111827/ffffff?text=VIP+Monthly+Giveaway+Announcement&quot;,
                &quot;status&quot;: &quot;published&quot;,
                &quot;published_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;VIP News&quot;,
                    &quot;slug&quot;: &quot;vip-news&quot;,
                    &quot;description&quot;: &quot;Posts about vip news&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                },
                &quot;tags&quot;: [
                    {
                        &quot;id&quot;: 6,
                        &quot;name&quot;: &quot;Best Seller&quot;,
                        &quot;slug&quot;: &quot;best-seller&quot;,
                        &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;post_id&quot;: 5,
                            &quot;tag_id&quot;: 6,
                            &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 7,
                        &quot;name&quot;: &quot;Clothing&quot;,
                        &quot;slug&quot;: &quot;clothing&quot;,
                        &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;post_id&quot;: 5,
                            &quot;tag_id&quot;: 7,
                            &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                        }
                    }
                ]
            },
            {
                &quot;id&quot;: 6,
                &quot;user_id&quot;: 3,
                &quot;post_category_id&quot;: 5,
                &quot;title&quot;: &quot;New Summer Gym Clothing Collection&quot;,
                &quot;slug&quot;: &quot;new-summer-gym-clothing-collection&quot;,
                &quot;excerpt&quot;: &quot;A simple FITSTORE article about new summer gym clothing collection.&quot;,
                &quot;content&quot;: &quot;&lt;p&gt;This post is written for the FITSTORE blog. It includes practical advice, clear sections and a friendly ecommerce tone.&lt;/p&gt;&lt;p&gt;Students can edit this content from the admin dashboard using the WYSIWYG editor.&lt;/p&gt;&quot;,
                &quot;image&quot;: &quot;https://placehold.co/1200x700/111827/ffffff?text=New+Summer+Gym+Clothing+Collection&quot;,
                &quot;status&quot;: &quot;published&quot;,
                &quot;published_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;deleted_at&quot;: null,
                &quot;category&quot;: {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;Offers&quot;,
                    &quot;slug&quot;: &quot;offers&quot;,
                    &quot;description&quot;: &quot;Posts about offers&quot;,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                },
                &quot;tags&quot;: [
                    {
                        &quot;id&quot;: 2,
                        &quot;name&quot;: &quot;Energy&quot;,
                        &quot;slug&quot;: &quot;energy&quot;,
                        &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;post_id&quot;: 6,
                            &quot;tag_id&quot;: 2,
                            &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                        }
                    },
                    {
                        &quot;id&quot;: 4,
                        &quot;name&quot;: &quot;Vegan&quot;,
                        &quot;slug&quot;: &quot;vegan&quot;,
                        &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                        &quot;pivot&quot;: {
                            &quot;post_id&quot;: 6,
                            &quot;tag_id&quot;: 4,
                            &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                            &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                        }
                    }
                ]
            }
        ],
        &quot;first_page_url&quot;: &quot;http://127.0.0.1:8000/api/posts?page=1&quot;,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;last_page_url&quot;: &quot;http://127.0.0.1:8000/api/posts?page=1&quot;,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://127.0.0.1:8000/api/posts?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;page&quot;: 1,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;page&quot;: null,
                &quot;active&quot;: false
            }
        ],
        &quot;next_page_url&quot;: null,
        &quot;path&quot;: &quot;http://127.0.0.1:8000/api/posts&quot;,
        &quot;per_page&quot;: 12,
        &quot;prev_page_url&quot;: null,
        &quot;to&quot;: 6,
        &quot;total&quot;: 6
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-posts" data-method="GET"
      data-path="api/posts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-posts"
                    onclick="tryItOut('GETapi-posts');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-posts"
                    onclick="cancelTryOut('GETapi-posts');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-posts"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-posts--post_id-">GET api/posts/{post_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-posts--post_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/posts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/posts/1"
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

<span id="example-responses-GETapi-posts--post_id-">
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
        &quot;id&quot;: 1,
        &quot;user_id&quot;: 3,
        &quot;post_category_id&quot;: 1,
        &quot;title&quot;: &quot;How to Choose the Right Protein&quot;,
        &quot;slug&quot;: &quot;how-to-choose-the-right-protein&quot;,
        &quot;excerpt&quot;: &quot;A simple FITSTORE article about how to choose the right protein.&quot;,
        &quot;content&quot;: &quot;&lt;p&gt;This post is written for the FITSTORE blog. It includes practical advice, clear sections and a friendly ecommerce tone.&lt;/p&gt;&lt;p&gt;Students can edit this content from the admin dashboard using the WYSIWYG editor.&lt;/p&gt;&quot;,
        &quot;image&quot;: &quot;https://placehold.co/1200x700/111827/ffffff?text=How+to+Choose+the+Right+Protein&quot;,
        &quot;status&quot;: &quot;published&quot;,
        &quot;published_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
        &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
        &quot;deleted_at&quot;: null,
        &quot;category&quot;: {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Nutrition&quot;,
            &quot;slug&quot;: &quot;nutrition&quot;,
            &quot;description&quot;: &quot;Posts about nutrition&quot;,
            &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
        },
        &quot;tags&quot;: [
            {
                &quot;id&quot;: 5,
                &quot;name&quot;: &quot;New&quot;,
                &quot;slug&quot;: &quot;new&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;pivot&quot;: {
                    &quot;post_id&quot;: 1,
                    &quot;tag_id&quot;: 5,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                }
            },
            {
                &quot;id&quot;: 7,
                &quot;name&quot;: &quot;Clothing&quot;,
                &quot;slug&quot;: &quot;clothing&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:13.000000Z&quot;,
                &quot;pivot&quot;: {
                    &quot;post_id&quot;: 1,
                    &quot;tag_id&quot;: 7,
                    &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
                }
            }
        ],
        &quot;comments&quot;: [
            {
                &quot;id&quot;: 1,
                &quot;post_id&quot;: 1,
                &quot;user_id&quot;: 6,
                &quot;content&quot;: &quot;Great advice, I will try it this week.&quot;,
                &quot;status&quot;: &quot;approved&quot;,
                &quot;created_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2026-05-12T17:31:15.000000Z&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-posts--post_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-posts--post_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--post_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-posts--post_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--post_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-posts--post_id-" data-method="GET"
      data-path="api/posts/{post_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--post_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-posts--post_id-"
                    onclick="tryItOut('GETapi-posts--post_id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-posts--post_id-"
                    onclick="cancelTryOut('GETapi-posts--post_id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-posts--post_id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/posts/{post_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-posts--post_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-posts--post_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>post_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="post_id"                data-endpoint="GETapi-posts--post_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/user"
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
                    onclick="tryItOut('GETapi-user');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
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
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-orders">GET api/orders</h2>

<p>
</p>



<span id="example-requests-GETapi-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/orders"
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

<span id="example-responses-GETapi-orders">
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
<span id="execution-results-GETapi-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-orders" data-method="GET"
      data-path="api/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-orders"
                    onclick="tryItOut('GETapi-orders');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-orders"
                    onclick="cancelTryOut('GETapi-orders');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-orders"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-orders">POST api/orders</h2>

<p>
</p>



<span id="example-requests-POSTapi-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"shipping_address\": \"b\",
    \"billing_address\": \"n\",
    \"total_price\": 84
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/orders"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "shipping_address": "b",
    "billing_address": "n",
    "total_price": 84
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-orders">
</span>
<span id="execution-results-POSTapi-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-orders" data-method="POST"
      data-path="api/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-orders"
                    onclick="tryItOut('POSTapi-orders');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-orders"
                    onclick="cancelTryOut('POSTapi-orders');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-orders"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>shipping_address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="shipping_address"                data-endpoint="POSTapi-orders"
               value="b"
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>b</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>billing_address</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="billing_address"                data-endpoint="POSTapi-orders"
               value="n"
               data-component="body">
    <br>
<p>Must not be greater than 1000 characters. Example: <code>n</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>total_price</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="total_price"                data-endpoint="POSTapi-orders"
               value="84"
               data-component="body">
    <br>
<p>Must be at least 0. Example: <code>84</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-orders--order_id-">GET api/orders/{order_id}</h2>

<p>
</p>



<span id="example-requests-GETapi-orders--order_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/orders/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/orders/1"
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

<span id="example-responses-GETapi-orders--order_id-">
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
<span id="execution-results-GETapi-orders--order_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-orders--order_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-orders--order_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-orders--order_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-orders--order_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-orders--order_id-" data-method="GET"
      data-path="api/orders/{order_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-orders--order_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-orders--order_id-"
                    onclick="tryItOut('GETapi-orders--order_id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-orders--order_id-"
                    onclick="cancelTryOut('GETapi-orders--order_id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-orders--order_id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/orders/{order_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-orders--order_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-orders--order_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="order_id"                data-endpoint="GETapi-orders--order_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-payments">GET api/payments</h2>

<p>
</p>



<span id="example-requests-GETapi-payments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/payments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/payments"
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

<span id="example-responses-GETapi-payments">
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
<span id="execution-results-GETapi-payments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-payments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-payments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-payments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-payments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-payments" data-method="GET"
      data-path="api/payments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-payments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-payments"
                    onclick="tryItOut('GETapi-payments');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-payments"
                    onclick="cancelTryOut('GETapi-payments');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-payments"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/payments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-payments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-payments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-payments">POST api/payments</h2>

<p>
</p>



<span id="example-requests-POSTapi-payments">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/payments" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"payment_method_id\": \"architecto\",
    \"amount\": 39
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/payments"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "payment_method_id": "architecto",
    "amount": 39
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-payments">
</span>
<span id="execution-results-POSTapi-payments" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-payments"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-payments"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-payments" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-payments">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-payments" data-method="POST"
      data-path="api/payments"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-payments', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-payments"
                    onclick="tryItOut('POSTapi-payments');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-payments"
                    onclick="cancelTryOut('POSTapi-payments');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-payments"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/payments</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-payments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-payments"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>payment_method_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="payment_method_id"                data-endpoint="POSTapi-payments"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the payment_methods table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>order_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="order_id"                data-endpoint="POSTapi-payments"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the orders table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>amount</code></b>&nbsp;&nbsp;
<small>number</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="amount"                data-endpoint="POSTapi-payments"
               value="39"
               data-component="body">
    <br>
<p>Must be at least 0.01. Example: <code>39</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-vip-subscription">GET api/vip-subscription</h2>

<p>
</p>



<span id="example-requests-GETapi-vip-subscription">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/vip-subscription" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/vip-subscription"
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

<span id="example-responses-GETapi-vip-subscription">
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
<span id="execution-results-GETapi-vip-subscription" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-vip-subscription"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-vip-subscription"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-vip-subscription" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-vip-subscription">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-vip-subscription" data-method="GET"
      data-path="api/vip-subscription"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-vip-subscription', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-vip-subscription"
                    onclick="tryItOut('GETapi-vip-subscription');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-vip-subscription"
                    onclick="cancelTryOut('GETapi-vip-subscription');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-vip-subscription"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/vip-subscription</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-vip-subscription"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-vip-subscription"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-cart-items">POST api/cart/items</h2>

<p>
</p>



<span id="example-requests-POSTapi-cart-items">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/cart/items" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"product_id\": \"architecto\",
    \"quantity\": 22
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cart/items"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "product_id": "architecto",
    "quantity": 22
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-cart-items">
</span>
<span id="execution-results-POSTapi-cart-items" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-cart-items"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-cart-items"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-cart-items" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-cart-items">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-cart-items" data-method="POST"
      data-path="api/cart/items"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-cart-items', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-cart-items"
                    onclick="tryItOut('POSTapi-cart-items');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-cart-items"
                    onclick="cancelTryOut('POSTapi-cart-items');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-cart-items"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/cart/items</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-cart-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-cart-items"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_id"                data-endpoint="POSTapi-cart-items"
               value="architecto"
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the products table. Example: <code>architecto</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product_variant_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product_variant_id"                data-endpoint="POSTapi-cart-items"
               value=""
               data-component="body">
    <br>
<p>The <code>id</code> of an existing record in the product_variants table.</p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>quantity</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="quantity"                data-endpoint="POSTapi-cart-items"
               value="22"
               data-component="body">
    <br>
<p>Must be at least 1. Example: <code>22</code></p>
        </div>
        </form>

                    <h2 id="endpoints-DELETEapi-cart-items--cartItem_id-">DELETE api/cart/items/{cartItem_id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-cart-items--cartItem_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/cart/items/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/cart/items/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-cart-items--cartItem_id-">
</span>
<span id="execution-results-DELETEapi-cart-items--cartItem_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-cart-items--cartItem_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-cart-items--cartItem_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-cart-items--cartItem_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-cart-items--cartItem_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-cart-items--cartItem_id-" data-method="DELETE"
      data-path="api/cart/items/{cartItem_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-cart-items--cartItem_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-cart-items--cartItem_id-"
                    onclick="tryItOut('DELETEapi-cart-items--cartItem_id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-cart-items--cartItem_id-"
                    onclick="cancelTryOut('DELETEapi-cart-items--cartItem_id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-cart-items--cartItem_id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/cart/items/{cartItem_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-cart-items--cartItem_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-cart-items--cartItem_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>cartItem_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="cartItem_id"                data-endpoint="DELETEapi-cart-items--cartItem_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the cartItem. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-POSTapi-products">POST api/products</h2>

<p>
</p>



<span id="example-requests-POSTapi-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/products"
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

<span id="example-responses-POSTapi-products">
</span>
<span id="execution-results-POSTapi-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-products" data-method="POST"
      data-path="api/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-products"
                    onclick="tryItOut('POSTapi-products');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-products"
                    onclick="cancelTryOut('POSTapi-products');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-products"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-PUTapi-products--product_id-">PUT api/products/{product_id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-products--product_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-products--product_id-">
</span>
<span id="execution-results-PUTapi-products--product_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-products--product_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-products--product_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-products--product_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-products--product_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-products--product_id-" data-method="PUT"
      data-path="api/products/{product_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-products--product_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-products--product_id-"
                    onclick="tryItOut('PUTapi-products--product_id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-products--product_id-"
                    onclick="cancelTryOut('PUTapi-products--product_id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-products--product_id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/products/{product_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="PUTapi-products--product_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PATCHapi-products--product_id-">PATCH api/products/{product_id}</h2>

<p>
</p>



<span id="example-requests-PATCHapi-products--product_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PATCH \
    "http://127.0.0.1:8000/api/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PATCH",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PATCHapi-products--product_id-">
</span>
<span id="execution-results-PATCHapi-products--product_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PATCHapi-products--product_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PATCHapi-products--product_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PATCHapi-products--product_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PATCHapi-products--product_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PATCHapi-products--product_id-" data-method="PATCH"
      data-path="api/products/{product_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PATCHapi-products--product_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PATCHapi-products--product_id-"
                    onclick="tryItOut('PATCHapi-products--product_id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PATCHapi-products--product_id-"
                    onclick="cancelTryOut('PATCHapi-products--product_id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PATCHapi-products--product_id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/products/{product_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PATCHapi-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PATCHapi-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="PATCHapi-products--product_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-products--product_id-">DELETE api/products/{product_id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-products--product_id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-products--product_id-">
</span>
<span id="execution-results-DELETEapi-products--product_id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-products--product_id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-products--product_id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-products--product_id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-products--product_id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-products--product_id-" data-method="DELETE"
      data-path="api/products/{product_id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-products--product_id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-products--product_id-"
                    onclick="tryItOut('DELETEapi-products--product_id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-products--product_id-"
                    onclick="cancelTryOut('DELETEapi-products--product_id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-products--product_id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/products/{product_id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-products--product_id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product_id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="product_id"                data-endpoint="DELETEapi-products--product_id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-admin-products">GET api/admin/products</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/products"
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

<span id="example-responses-GETapi-admin-products">
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
<span id="execution-results-GETapi-admin-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-products" data-method="GET"
      data-path="api/admin/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-products"
                    onclick="tryItOut('GETapi-admin-products');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-products"
                    onclick="cancelTryOut('GETapi-admin-products');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-products"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-admin-products">POST api/admin/products</h2>

<p>
</p>



<span id="example-requests-POSTapi-admin-products">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admin/products" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/products"
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

<span id="example-responses-POSTapi-admin-products">
</span>
<span id="execution-results-POSTapi-admin-products" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-products"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-products"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-products" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-products">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-products" data-method="POST"
      data-path="api/admin/products"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-products', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-products"
                    onclick="tryItOut('POSTapi-admin-products');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-products"
                    onclick="cancelTryOut('POSTapi-admin-products');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-products"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/products</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-products"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-admin-products--id-">GET api/admin/products/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/products/1"
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

<span id="example-responses-GETapi-admin-products--id-">
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
<span id="execution-results-GETapi-admin-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-products--id-" data-method="GET"
      data-path="api/admin/products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-products--id-"
                    onclick="tryItOut('GETapi-admin-products--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-products--id-"
                    onclick="cancelTryOut('GETapi-admin-products--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-products--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-products--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-admin-products--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-admin-products--id-">PUT api/admin/products/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-admin-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/admin/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-products--id-">
</span>
<span id="execution-results-PUTapi-admin-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-products--id-" data-method="PUT"
      data-path="api/admin/products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-products--id-"
                    onclick="tryItOut('PUTapi-admin-products--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-products--id-"
                    onclick="cancelTryOut('PUTapi-admin-products--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-products--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/products/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-products--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-admin-products--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-admin-products--id-">DELETE api/admin/products/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-admin-products--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/admin/products/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/products/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-products--id-">
</span>
<span id="execution-results-DELETEapi-admin-products--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-products--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-products--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-products--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-products--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-products--id-" data-method="DELETE"
      data-path="api/admin/products/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-products--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-products--id-"
                    onclick="tryItOut('DELETEapi-admin-products--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-products--id-"
                    onclick="cancelTryOut('DELETEapi-admin-products--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-products--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/products/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-products--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-products--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-admin-products--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the product. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-admin-categories">GET api/admin/categories</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/categories"
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

<span id="example-responses-GETapi-admin-categories">
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
<span id="execution-results-GETapi-admin-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-categories" data-method="GET"
      data-path="api/admin/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-categories"
                    onclick="tryItOut('GETapi-admin-categories');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-categories"
                    onclick="cancelTryOut('GETapi-admin-categories');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-categories"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-admin-categories">POST api/admin/categories</h2>

<p>
</p>



<span id="example-requests-POSTapi-admin-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admin/categories" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/categories"
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

<span id="example-responses-POSTapi-admin-categories">
</span>
<span id="execution-results-POSTapi-admin-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-categories" data-method="POST"
      data-path="api/admin/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-categories"
                    onclick="tryItOut('POSTapi-admin-categories');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-categories"
                    onclick="cancelTryOut('POSTapi-admin-categories');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-categories"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-admin-categories--id-">GET api/admin/categories/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/categories/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/categories/1"
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

<span id="example-responses-GETapi-admin-categories--id-">
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
<span id="execution-results-GETapi-admin-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-categories--id-" data-method="GET"
      data-path="api/admin/categories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-categories--id-"
                    onclick="tryItOut('GETapi-admin-categories--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-categories--id-"
                    onclick="cancelTryOut('GETapi-admin-categories--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-categories--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-categories--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-admin-categories--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-admin-categories--id-">PUT api/admin/categories/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-admin-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/admin/categories/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/categories/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-categories--id-">
</span>
<span id="execution-results-PUTapi-admin-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-categories--id-" data-method="PUT"
      data-path="api/admin/categories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-categories--id-"
                    onclick="tryItOut('PUTapi-admin-categories--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-categories--id-"
                    onclick="cancelTryOut('PUTapi-admin-categories--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-categories--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/categories/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-categories--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-admin-categories--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-admin-categories--id-">DELETE api/admin/categories/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-admin-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/admin/categories/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/categories/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-categories--id-">
</span>
<span id="execution-results-DELETEapi-admin-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-categories--id-" data-method="DELETE"
      data-path="api/admin/categories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-categories--id-"
                    onclick="tryItOut('DELETEapi-admin-categories--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-categories--id-"
                    onclick="cancelTryOut('DELETEapi-admin-categories--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-categories--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-categories--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-admin-categories--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-admin-orders">GET api/admin/orders</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/orders"
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

<span id="example-responses-GETapi-admin-orders">
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
<span id="execution-results-GETapi-admin-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-orders" data-method="GET"
      data-path="api/admin/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-orders"
                    onclick="tryItOut('GETapi-admin-orders');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-orders"
                    onclick="cancelTryOut('GETapi-admin-orders');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-orders"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-admin-orders">POST api/admin/orders</h2>

<p>
</p>



<span id="example-requests-POSTapi-admin-orders">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admin/orders" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/orders"
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

<span id="example-responses-POSTapi-admin-orders">
</span>
<span id="execution-results-POSTapi-admin-orders" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-orders"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-orders"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-orders" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-orders">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-orders" data-method="POST"
      data-path="api/admin/orders"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-orders', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-orders"
                    onclick="tryItOut('POSTapi-admin-orders');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-orders"
                    onclick="cancelTryOut('POSTapi-admin-orders');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-orders"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/orders</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-orders"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-admin-orders--id-">GET api/admin/orders/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-orders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/orders/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/orders/1"
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

<span id="example-responses-GETapi-admin-orders--id-">
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
<span id="execution-results-GETapi-admin-orders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-orders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-orders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-orders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-orders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-orders--id-" data-method="GET"
      data-path="api/admin/orders/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-orders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-orders--id-"
                    onclick="tryItOut('GETapi-admin-orders--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-orders--id-"
                    onclick="cancelTryOut('GETapi-admin-orders--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-orders--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/orders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-orders--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-admin-orders--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-admin-orders--id-">PUT api/admin/orders/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-admin-orders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/admin/orders/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/orders/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-orders--id-">
</span>
<span id="execution-results-PUTapi-admin-orders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-orders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-orders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-orders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-orders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-orders--id-" data-method="PUT"
      data-path="api/admin/orders/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-orders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-orders--id-"
                    onclick="tryItOut('PUTapi-admin-orders--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-orders--id-"
                    onclick="cancelTryOut('PUTapi-admin-orders--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-orders--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/orders/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/orders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-orders--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-admin-orders--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-admin-orders--id-">DELETE api/admin/orders/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-admin-orders--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/admin/orders/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/orders/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-orders--id-">
</span>
<span id="execution-results-DELETEapi-admin-orders--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-orders--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-orders--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-orders--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-orders--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-orders--id-" data-method="DELETE"
      data-path="api/admin/orders/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-orders--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-orders--id-"
                    onclick="tryItOut('DELETEapi-admin-orders--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-orders--id-"
                    onclick="cancelTryOut('DELETEapi-admin-orders--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-orders--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/orders/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-orders--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-orders--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-admin-orders--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the order. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-admin-discounts">GET api/admin/discounts</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-discounts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/discounts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/discounts"
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

<span id="example-responses-GETapi-admin-discounts">
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
<span id="execution-results-GETapi-admin-discounts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-discounts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-discounts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-discounts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-discounts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-discounts" data-method="GET"
      data-path="api/admin/discounts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-discounts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-discounts"
                    onclick="tryItOut('GETapi-admin-discounts');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-discounts"
                    onclick="cancelTryOut('GETapi-admin-discounts');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-discounts"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/discounts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-discounts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-discounts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-admin-discounts">POST api/admin/discounts</h2>

<p>
</p>



<span id="example-requests-POSTapi-admin-discounts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admin/discounts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/discounts"
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

<span id="example-responses-POSTapi-admin-discounts">
</span>
<span id="execution-results-POSTapi-admin-discounts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-discounts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-discounts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-discounts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-discounts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-discounts" data-method="POST"
      data-path="api/admin/discounts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-discounts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-discounts"
                    onclick="tryItOut('POSTapi-admin-discounts');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-discounts"
                    onclick="cancelTryOut('POSTapi-admin-discounts');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-discounts"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/discounts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-discounts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-discounts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-admin-discounts--id-">GET api/admin/discounts/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-discounts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/discounts/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/discounts/architecto"
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

<span id="example-responses-GETapi-admin-discounts--id-">
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
<span id="execution-results-GETapi-admin-discounts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-discounts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-discounts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-discounts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-discounts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-discounts--id-" data-method="GET"
      data-path="api/admin/discounts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-discounts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-discounts--id-"
                    onclick="tryItOut('GETapi-admin-discounts--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-discounts--id-"
                    onclick="cancelTryOut('GETapi-admin-discounts--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-discounts--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/discounts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-discounts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-discounts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-admin-discounts--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the discount. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-admin-discounts--id-">PUT api/admin/discounts/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-admin-discounts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/admin/discounts/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/discounts/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-discounts--id-">
</span>
<span id="execution-results-PUTapi-admin-discounts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-discounts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-discounts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-discounts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-discounts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-discounts--id-" data-method="PUT"
      data-path="api/admin/discounts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-discounts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-discounts--id-"
                    onclick="tryItOut('PUTapi-admin-discounts--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-discounts--id-"
                    onclick="cancelTryOut('PUTapi-admin-discounts--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-discounts--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/discounts/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/discounts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-discounts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-discounts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-admin-discounts--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the discount. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-admin-discounts--id-">DELETE api/admin/discounts/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-admin-discounts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/admin/discounts/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/discounts/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-discounts--id-">
</span>
<span id="execution-results-DELETEapi-admin-discounts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-discounts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-discounts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-discounts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-discounts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-discounts--id-" data-method="DELETE"
      data-path="api/admin/discounts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-discounts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-discounts--id-"
                    onclick="tryItOut('DELETEapi-admin-discounts--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-discounts--id-"
                    onclick="cancelTryOut('DELETEapi-admin-discounts--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-discounts--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/discounts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-discounts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-discounts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-admin-discounts--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the discount. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-admin-coupons">GET api/admin/coupons</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-coupons">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/coupons" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/coupons"
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

<span id="example-responses-GETapi-admin-coupons">
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
<span id="execution-results-GETapi-admin-coupons" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-coupons"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-coupons"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-coupons" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-coupons">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-coupons" data-method="GET"
      data-path="api/admin/coupons"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-coupons', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-coupons"
                    onclick="tryItOut('GETapi-admin-coupons');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-coupons"
                    onclick="cancelTryOut('GETapi-admin-coupons');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-coupons"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/coupons</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-coupons"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-coupons"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-admin-coupons">POST api/admin/coupons</h2>

<p>
</p>



<span id="example-requests-POSTapi-admin-coupons">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admin/coupons" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/coupons"
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

<span id="example-responses-POSTapi-admin-coupons">
</span>
<span id="execution-results-POSTapi-admin-coupons" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-coupons"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-coupons"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-coupons" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-coupons">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-coupons" data-method="POST"
      data-path="api/admin/coupons"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-coupons', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-coupons"
                    onclick="tryItOut('POSTapi-admin-coupons');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-coupons"
                    onclick="cancelTryOut('POSTapi-admin-coupons');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-coupons"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/coupons</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-coupons"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-coupons"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-admin-coupons--id-">GET api/admin/coupons/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-coupons--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/coupons/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/coupons/architecto"
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

<span id="example-responses-GETapi-admin-coupons--id-">
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
<span id="execution-results-GETapi-admin-coupons--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-coupons--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-coupons--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-coupons--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-coupons--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-coupons--id-" data-method="GET"
      data-path="api/admin/coupons/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-coupons--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-coupons--id-"
                    onclick="tryItOut('GETapi-admin-coupons--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-coupons--id-"
                    onclick="cancelTryOut('GETapi-admin-coupons--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-coupons--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/coupons/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-coupons--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-coupons--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-admin-coupons--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the coupon. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-admin-coupons--id-">PUT api/admin/coupons/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-admin-coupons--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/admin/coupons/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/coupons/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-coupons--id-">
</span>
<span id="execution-results-PUTapi-admin-coupons--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-coupons--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-coupons--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-coupons--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-coupons--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-coupons--id-" data-method="PUT"
      data-path="api/admin/coupons/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-coupons--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-coupons--id-"
                    onclick="tryItOut('PUTapi-admin-coupons--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-coupons--id-"
                    onclick="cancelTryOut('PUTapi-admin-coupons--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-coupons--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/coupons/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/coupons/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-coupons--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-coupons--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-admin-coupons--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the coupon. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-admin-coupons--id-">DELETE api/admin/coupons/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-admin-coupons--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/admin/coupons/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/coupons/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-coupons--id-">
</span>
<span id="execution-results-DELETEapi-admin-coupons--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-coupons--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-coupons--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-coupons--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-coupons--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-coupons--id-" data-method="DELETE"
      data-path="api/admin/coupons/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-coupons--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-coupons--id-"
                    onclick="tryItOut('DELETEapi-admin-coupons--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-coupons--id-"
                    onclick="cancelTryOut('DELETEapi-admin-coupons--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-coupons--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/coupons/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-coupons--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-coupons--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-admin-coupons--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the coupon. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-admin-giveaways">GET api/admin/giveaways</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-giveaways">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/giveaways" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/giveaways"
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

<span id="example-responses-GETapi-admin-giveaways">
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
<span id="execution-results-GETapi-admin-giveaways" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-giveaways"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-giveaways"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-giveaways" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-giveaways">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-giveaways" data-method="GET"
      data-path="api/admin/giveaways"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-giveaways', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-giveaways"
                    onclick="tryItOut('GETapi-admin-giveaways');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-giveaways"
                    onclick="cancelTryOut('GETapi-admin-giveaways');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-giveaways"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/giveaways</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-giveaways"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-giveaways"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-admin-giveaways">POST api/admin/giveaways</h2>

<p>
</p>



<span id="example-requests-POSTapi-admin-giveaways">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admin/giveaways" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/giveaways"
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

<span id="example-responses-POSTapi-admin-giveaways">
</span>
<span id="execution-results-POSTapi-admin-giveaways" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-giveaways"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-giveaways"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-giveaways" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-giveaways">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-giveaways" data-method="POST"
      data-path="api/admin/giveaways"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-giveaways', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-giveaways"
                    onclick="tryItOut('POSTapi-admin-giveaways');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-giveaways"
                    onclick="cancelTryOut('POSTapi-admin-giveaways');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-giveaways"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/giveaways</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-giveaways"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-giveaways"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-admin-giveaways--id-">GET api/admin/giveaways/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-giveaways--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/giveaways/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/giveaways/1"
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

<span id="example-responses-GETapi-admin-giveaways--id-">
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
<span id="execution-results-GETapi-admin-giveaways--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-giveaways--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-giveaways--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-giveaways--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-giveaways--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-giveaways--id-" data-method="GET"
      data-path="api/admin/giveaways/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-giveaways--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-giveaways--id-"
                    onclick="tryItOut('GETapi-admin-giveaways--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-giveaways--id-"
                    onclick="cancelTryOut('GETapi-admin-giveaways--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-giveaways--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/giveaways/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-giveaways--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-giveaways--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-admin-giveaways--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the giveaway. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-admin-giveaways--id-">PUT api/admin/giveaways/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-admin-giveaways--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/admin/giveaways/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/giveaways/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-giveaways--id-">
</span>
<span id="execution-results-PUTapi-admin-giveaways--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-giveaways--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-giveaways--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-giveaways--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-giveaways--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-giveaways--id-" data-method="PUT"
      data-path="api/admin/giveaways/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-giveaways--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-giveaways--id-"
                    onclick="tryItOut('PUTapi-admin-giveaways--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-giveaways--id-"
                    onclick="cancelTryOut('PUTapi-admin-giveaways--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-giveaways--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/giveaways/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/giveaways/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-giveaways--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-giveaways--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-admin-giveaways--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the giveaway. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-admin-giveaways--id-">DELETE api/admin/giveaways/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-admin-giveaways--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/admin/giveaways/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/giveaways/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-giveaways--id-">
</span>
<span id="execution-results-DELETEapi-admin-giveaways--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-giveaways--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-giveaways--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-giveaways--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-giveaways--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-giveaways--id-" data-method="DELETE"
      data-path="api/admin/giveaways/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-giveaways--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-giveaways--id-"
                    onclick="tryItOut('DELETEapi-admin-giveaways--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-giveaways--id-"
                    onclick="cancelTryOut('DELETEapi-admin-giveaways--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-giveaways--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/giveaways/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-giveaways--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-giveaways--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-admin-giveaways--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the giveaway. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-admin-posts">GET api/admin/posts</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/posts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/posts"
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

<span id="example-responses-GETapi-admin-posts">
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
<span id="execution-results-GETapi-admin-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-posts" data-method="GET"
      data-path="api/admin/posts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-posts"
                    onclick="tryItOut('GETapi-admin-posts');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-posts"
                    onclick="cancelTryOut('GETapi-admin-posts');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-posts"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-admin-posts">POST api/admin/posts</h2>

<p>
</p>



<span id="example-requests-POSTapi-admin-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admin/posts" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/posts"
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

<span id="example-responses-POSTapi-admin-posts">
</span>
<span id="execution-results-POSTapi-admin-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-posts" data-method="POST"
      data-path="api/admin/posts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-posts"
                    onclick="tryItOut('POSTapi-admin-posts');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-posts"
                    onclick="cancelTryOut('POSTapi-admin-posts');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-posts"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-admin-posts--id-">GET api/admin/posts/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-posts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/posts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/posts/1"
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

<span id="example-responses-GETapi-admin-posts--id-">
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
<span id="execution-results-GETapi-admin-posts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-posts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-posts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-posts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-posts--id-" data-method="GET"
      data-path="api/admin/posts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-posts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-posts--id-"
                    onclick="tryItOut('GETapi-admin-posts--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-posts--id-"
                    onclick="cancelTryOut('GETapi-admin-posts--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-posts--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/posts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-posts--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-admin-posts--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-admin-posts--id-">PUT api/admin/posts/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-admin-posts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/admin/posts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/posts/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-posts--id-">
</span>
<span id="execution-results-PUTapi-admin-posts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-posts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-posts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-posts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-posts--id-" data-method="PUT"
      data-path="api/admin/posts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-posts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-posts--id-"
                    onclick="tryItOut('PUTapi-admin-posts--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-posts--id-"
                    onclick="cancelTryOut('PUTapi-admin-posts--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-posts--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/posts/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/posts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-posts--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="PUTapi-admin-posts--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-admin-posts--id-">DELETE api/admin/posts/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-admin-posts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/admin/posts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/posts/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-posts--id-">
</span>
<span id="execution-results-DELETEapi-admin-posts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-posts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-posts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-posts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-posts--id-" data-method="DELETE"
      data-path="api/admin/posts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-posts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-posts--id-"
                    onclick="tryItOut('DELETEapi-admin-posts--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-posts--id-"
                    onclick="cancelTryOut('DELETEapi-admin-posts--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-posts--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/posts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-posts--id-"
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
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="DELETEapi-admin-posts--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-admin-documents">GET api/admin/documents</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-documents">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/documents" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/documents"
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

<span id="example-responses-GETapi-admin-documents">
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
<span id="execution-results-GETapi-admin-documents" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-documents"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-documents"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-documents" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-documents">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-documents" data-method="GET"
      data-path="api/admin/documents"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-documents', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-documents"
                    onclick="tryItOut('GETapi-admin-documents');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-documents"
                    onclick="cancelTryOut('GETapi-admin-documents');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-documents"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/documents</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-documents"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-documents"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-admin-documents">POST api/admin/documents</h2>

<p>
</p>



<span id="example-requests-POSTapi-admin-documents">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://127.0.0.1:8000/api/admin/documents" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/documents"
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

<span id="example-responses-POSTapi-admin-documents">
</span>
<span id="execution-results-POSTapi-admin-documents" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-admin-documents"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-admin-documents"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-admin-documents" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-admin-documents">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-admin-documents" data-method="POST"
      data-path="api/admin/documents"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-admin-documents', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-admin-documents"
                    onclick="tryItOut('POSTapi-admin-documents');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-admin-documents"
                    onclick="cancelTryOut('POSTapi-admin-documents');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-admin-documents"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/admin/documents</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-admin-documents"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-admin-documents"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-admin-documents--id-">GET api/admin/documents/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-admin-documents--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://127.0.0.1:8000/api/admin/documents/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/documents/architecto"
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

<span id="example-responses-GETapi-admin-documents--id-">
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
<span id="execution-results-GETapi-admin-documents--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-admin-documents--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-admin-documents--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-admin-documents--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-admin-documents--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-admin-documents--id-" data-method="GET"
      data-path="api/admin/documents/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-admin-documents--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-admin-documents--id-"
                    onclick="tryItOut('GETapi-admin-documents--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-admin-documents--id-"
                    onclick="cancelTryOut('GETapi-admin-documents--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-admin-documents--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/admin/documents/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-admin-documents--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-admin-documents--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="GETapi-admin-documents--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the document. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-PUTapi-admin-documents--id-">PUT api/admin/documents/{id}</h2>

<p>
</p>



<span id="example-requests-PUTapi-admin-documents--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request PUT \
    "http://127.0.0.1:8000/api/admin/documents/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/documents/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "PUT",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-PUTapi-admin-documents--id-">
</span>
<span id="execution-results-PUTapi-admin-documents--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-PUTapi-admin-documents--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-PUTapi-admin-documents--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-PUTapi-admin-documents--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-PUTapi-admin-documents--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-PUTapi-admin-documents--id-" data-method="PUT"
      data-path="api/admin/documents/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('PUTapi-admin-documents--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-PUTapi-admin-documents--id-"
                    onclick="tryItOut('PUTapi-admin-documents--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-PUTapi-admin-documents--id-"
                    onclick="cancelTryOut('PUTapi-admin-documents--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-PUTapi-admin-documents--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-darkblue">PUT</small>
            <b><code>api/admin/documents/{id}</code></b>
        </p>
            <p>
            <small class="badge badge-purple">PATCH</small>
            <b><code>api/admin/documents/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="PUTapi-admin-documents--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="PUTapi-admin-documents--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="PUTapi-admin-documents--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the document. Example: <code>architecto</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-DELETEapi-admin-documents--id-">DELETE api/admin/documents/{id}</h2>

<p>
</p>



<span id="example-requests-DELETEapi-admin-documents--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request DELETE \
    "http://127.0.0.1:8000/api/admin/documents/architecto" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://127.0.0.1:8000/api/admin/documents/architecto"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "DELETE",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-DELETEapi-admin-documents--id-">
</span>
<span id="execution-results-DELETEapi-admin-documents--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-DELETEapi-admin-documents--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-DELETEapi-admin-documents--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-DELETEapi-admin-documents--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-DELETEapi-admin-documents--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-DELETEapi-admin-documents--id-" data-method="DELETE"
      data-path="api/admin/documents/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('DELETEapi-admin-documents--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-DELETEapi-admin-documents--id-"
                    onclick="tryItOut('DELETEapi-admin-documents--id-');">Try it out âš¡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-DELETEapi-admin-documents--id-"
                    onclick="cancelTryOut('DELETEapi-admin-documents--id-');" hidden>Cancel ðŸ›‘
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-DELETEapi-admin-documents--id-"
                    data-initial-text="Send Request ðŸ’¥"
                    data-loading-text="â± Sending..."
                    hidden>Send Request ðŸ’¥
            </button>
            </h3>
            <p>
            <small class="badge badge-red">DELETE</small>
            <b><code>api/admin/documents/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="DELETEapi-admin-documents--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="DELETEapi-admin-documents--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="DELETEapi-admin-documents--id-"
               value="architecto"
               data-component="url">
    <br>
<p>The ID of the document. Example: <code>architecto</code></p>
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

