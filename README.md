# TrackMail #

Find out how many people actually open the emails sent by your bulk mail system, including data on the clients they use.

## Why? ##

Ever written a system to send out a load of emails for you automatically, like a newsletter for your site? Ever used PHP blogs or forums that have newsletter functionality you can customise, such as WordPress? Maybe you're thinking of doing so in the near future? Well, if you answered "yes" to any of those have you given a thought to the fact that you have no idea who is ignoring your emails and who is at least reading them?

**TrackMail** aims to give you the means to not only keep an eye on who reads your emails, but how many times they read them, what clients are being used to read them and hopefully a way of judging what types of content your audience prefer.

It's a little project I've wanted to have a proper go at for a while now and I figured it'd be a good way to feel out [PhpStorm](http://www.jetbrains.com/phpstorm/) which I'm thinking of switching to from [Sublime Text 2](http://www.sublimetext.com/).

## Features ##

**TrackMail** is unobtrusive, it shows up in your emails as a tiny 1x1 pixel transparent PNG that you can position wherever you want.

Data tracked:

* Timestamp of each open
* Recipient email address
* Batch identifier
* Recipient's OS
* Recipient's client (email client or web browser)

## Instructions ##

Simply put your **TrackMail** URL as an image `src` in your HTML email templates, feed it a batch identifier (equivalent to the campaign in Google Analytics) and the recipient email address as a querystring, and you're good to go.

It's that easy.

## To Do ##

For the next release I'm planning to make including it in your emails much easier, by way of class instantiation rather than a raw HTML image tag. After that, here's a list of the features I have on my mind at the moment, in no particular order:

* Track link clicks from emails
* Use any image as the tracking image
* Optional verification check (so only the intended email address/batch identifier logs data)
* Somehow track forwards
 
## Changelog ##

### v1.0 ###

Initial release.

Tracks:

* Timestamp of each open
* Recipient email address
* Batch identifier
* Recipient's OS
* Recipient's client (email client or web browser)

Usage:

* image `src` in HTML email
* email address and identifier as query string
* presence set as a 1x1 pixel transparent PNG
