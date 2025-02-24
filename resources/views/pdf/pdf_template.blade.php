<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Questionnaire</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        .container {
            padding: 20px;
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        h4 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        p {
            margin: 0;
        }

        strong {
            font-weight: bold;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>

    @foreach ($data as $key => $dt)
        @if ($key == 'services')
            <p><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong></p>
            <ul>
                @foreach ($dt as $service)
                    <li>{{ ucfirst(str_replace('_', ' ', $service)) }}</li>
                @endforeach
            </ul>
            @continue
        @endif
        @php
            $title = str_replace('_', ' ', $key);
        @endphp
        <p>{{ ucfirst($title) }} <strong>{{ $dt }}</strong></p>
    @endforeach

    <h4>Reference Images(s)</h4>
    <br />
    <br />
    @if (!empty($filePaths))
        @foreach ($filePaths as $img)
            <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('public/' . $img))); ?>" style="width: 250px; margin: 10px;">
            <a href="{{ asset($img) }}">Image</a>
        @endforeach
    @endif

    {{-- <div class="container">
        <h4 class="my-3">Personal Details</h4>
        <div class="mb-3">
            <p>Full Name</p>
            <p><strong>{{ $data['name'] }}</strong></p>
        </div>
        <div class="mb-3">
            <p>Email</p>
            <p><strong>{{ $data['email'] }}</strong></p>
        </div>
        <div class="mb-3">
            <p>Phone</p>
            <p><strong>{{ $data['phone'] }}</strong></p>
        </div>


        <h4 class="my-3">Understanding Your Business</h4>
        <div class="mb-3">
            <p>1. Will the website be a completely new site or will it be a redesign of an existing site? (In case of
                website revamp, elaborate in a descriptive manner the changes that you would like to be implemented)</p>
            <p><strong>{{ $data['web_type'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>2. Your business overview, products & services?</p>
            <p><strong>{{ $data['business_overview'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>3. What is your USP (Unique Sales Proposition or what makes you special)?</p>
            <p><strong>{{ $data['usp'] }}</strong></p>
        </div>

        <h4 class="my-3">Understanding Your Customers</h4>

        <div class="mb-3">
            <p>Please describe your target customers or the audience you intend to reach via your website (For example:
                are
                they primarily other businesses, special interest groups, consumers, their interests, age, sex, social
                status, wealth bracket)?</p>
            <p><strong>{{ $data['target_audience'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>How do they buy or acquire knowledge about your products or services at the moment?</p>
            <p><strong>{{ $data['current_buying_process'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>Does your target audience have any visual impairment or disability that we should be aware of?</p>
            <p><strong>{{ $data['accessibility_requirements'] }}</strong></p>
        </div>

        <h4 class="my-3">Understanding Your Competitors</h4>

        <div class="mb-3">
            <p>Please list some of your direct competitors’ websites or other sites that you think we should be aware of
                and
                why?</p>
            <p><strong>{{ $data['competitor_sites'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>How do you plan to outflank the competition? Any unique ideas that you have to incorporate on your
                website?
            </p>
            <p><strong>{{ $data['competition_strategy'] }}</strong></p>
        </div>

        <h4 class="my-3">Understanding Your Website Requirements</h4>

        <div class="mb-3">
            <p>1. Do you have premises you trade from or is this a purely online business?</p>
            <p><strong>{{ $data['business_model'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>2. Do you have a logo, please provide source files? (Leave blank if the logo is designed by us)</p>
            <p>
                <img style="width: 200px" src="http://localhost:8000/logos/{{ $filename }}" alt="">
            </p>
        </div>

        <div class="mb-3">
            <p>3. Do you already have a domain name? If so, please state:</p>
            <p><strong>{{ $data['domain_name'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>4. Do you already have hosting and email accounts? (If so, please state the service provider and hosting
                package)</p>
            <p><strong>{{ $data['hosting_details'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>5. Do you have images that you would like to be used on your website? (If so, please provide in high
                resolution size)</p>
            <p><strong>{{ $data['site_images'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>6. Do you have content for your website? (If so, please provide in editable word document)</p>
            <p><strong>{{ $data['site_content'] }}</strong></p>
        </div>

        <h4 class="my-3">Understanding Your Website Functionality</h4>

        <div class="mb-3">
            <p>1. Do you want to be able to update some or all of the pages within the site yourself (a CMS or Content
                Managed System)?</p>
            <p><strong>{{ $data['cms_requirement'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>2. Will there be any online forms for visitors to complete on your website?</p>
            <p><strong>{{ $data['online_forms'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>3. Do you require any online booking or reservation system?</p>
            <p><strong>{{ $data['booking_system'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>4. Does the site need to link with an existing back office system, e.g., database or EPOS? If yes, please
                state:</p>
            <p><strong>{{ $data['back_office_integration'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>5. Will all or part of the site be in any language other than English? If so, please state:</p>
            <p><strong>{{ $data['multilingual_needs'] }}</strong></p>
        </div>

        <h4 class="my-3">Navigation</h4>
        <div class="mb-3">
            <p>Please list the different pages or menu categories that are likely to be required within the site.</p>
            </br>
            <p>As a matter of good practice we will usually include a site map, privacy statement, your conditions or
                terms of use along with a statistics package like Google Analytics or similar.</p>
            <p><strong>{{ $data['menu_tabs'] }}</strong></p>
        </div>
        <div class="mb-3">
            <p>Identities you like or dislike? (Share 3 references at least)</p>
            <p><strong>{{ $data['preferred_identities'] }}</strong></p>
        </div>

        <h4 class="my-3">Online Selling (Leave Blank if not applicable)</h4>
        <p>If you intend to make sales over the web:</p>
        <div class="mb-3">
            <p>1. How many products/categories and products within each category do you want to sell?</p>
            <p><strong>{{ $data['product_details'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>2. Will your clients buy your products/services online using a credit or debit card or contact you by
                phone?
            </p>
            <p><strong>{{ $data['payment_methods'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>3. If you are selling online, do you already have a merchant account or will you be using PayPal?</p>
            <p><strong>{{ $data['merchant_account'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>4. Do you have a ‘real world’ shop or shops and if yes how many?</p>
            <p><strong>{{ $data['physical_stores'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>5. Do you use stock control software, if so which?</p>
            <p><strong>{{ $data['stock_control'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>6. Do you have any special issues concerning foreign currencies, sales tax, shipping etc.? If so please
                state:</p>
            <p><strong>{{ $data['international_requirements'] }}</strong></p>
        </div>

        <h4 class="my-3">Animations & Video Clips (Leave Blank if not applicable)</h4>
        <div class="mb-3">
            <p>Do you require any animation, moving images or video clips?</p>
            <br />
            <p>Please describe what you require and, if appropriate, the addresses of other sites which use similar
                techniques. </p>
            <p><strong>{{ $data['animation_requirements'] }}</strong></p>
        </div>

        <h4 class="my-3">Social Media Integration (Leave Blank if not applicable)</h4>
        <div class="mb-3">
            <p>1. Please specify social media platforms to be linked to your website</p>
            <p><strong>{{ $data['social_media_platforms'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>2. Provide links to existing social media profiles (If any)</p>
            <p><strong>{{ $data['social_media_links'] }}</strong></p>
        </div>

        <h4 class="my-3">SEO Services (Leave Blank if not applicable)</h4>
        <div class="mb-3">
            <p>1. How will people find your website – is it important that you are highly ranked in search engines?</p>
            <p><strong>{{ $data['seo_importance'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>2. If searching for your site within a search engine, what keywords and phrases might be used?</p>
            <p><strong>{{ $data['seo_keywords'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>3. Do you require Search Engine Optimization services?</p>
            <p><strong>{{ $data['seo_services'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>4. Do you require a pay per click package?</p>
            <p><strong>{{ $data['ppc_services'] }}</strong></p>
        </div>


        <h4 class="my-3">Deadlines & Budget</h4>
        <div class="mb-3">
            <p>1. Please indicate deadline for site to go live?</p>
            <p><strong>{{ $data['go_live_deadline'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>2. Please indicate any budget constraints</p>
            <p><strong>{{ $data['budget_constraints'] }}</strong></p>
        </div>

        <div class="mb-3">
            <p>3. Please provide any information which you think we might need to know, which hasn’t been covered in
                your answers?</p>
            <p><strong>{{ $data['additional_info'] }}</strong></p>
        </div>

    </div> --}}

</body>

</html>
