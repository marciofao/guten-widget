# guten-widget
Simple Gutemberg widget plugin for wordpress

It creates a gutenberg widget to display weather forecast of fnugg resort in wordpress posts and pages.

It also creates an API middleware for not exposing the data source api:
http://[WEBSITE_LOCATION]/wp-json/wp/v2/guten-widget?s=fonna

## Usage

The Gutenberg block on the post editor screen:
![Gutenberg block on the post editor screen](/img/block-screen.png "Gutenberg block on the post editor screen")


The rendered fronted of the block with data fetched from the API:
![The rendered fronted of the block with data fetched from the API](/img/frontend-rendered-block.png "The rendered fronted of the block with data fetched from the API:")