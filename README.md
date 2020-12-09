Our initial philosophy is that there is no one source of truth. We don’t believe that there are the “Ten Best Things to Do in Costa Rica” but the ten best things to do for each different person. According to us, that’s the key to an enhanced experience. Finding the right person, the right like-minded local, for that local knowledge. Because you have similar interests, there’s the key to a better experience. Customers get to ask them advice through our platform and book directly with the hotel. Ambassadors can tap into their network of insiders and pro athletes to offer authentique surf travel experiences.

# Basic React Files for WordPress
The repository contains the very basic Required files to create a react app with JSX (in WordPress). The goal is to use Aragon Govern to connect with the surfbnb.tv website. Below is our proposal regarding the sic core feature we would like to custom develop as a showcase of Aragon V2

# 1/ Join the DAO 📽

> Users should be able to join our DAO directly from within [www.surfbnb.tv](http://www.surfbnb.tv)  This can perhaps be accomplished by combining [Fortmatic](https://fortmatic.com/) + [Magic](https://magic.link/). Fortmatic is used to generate a wallet address for the user based on their email or phone number. Magic is used to email them their password.

By joining our DAO, they would then be issued a token in the surfbnb DAO so that they can participate in votes.

A joining fee (1500 SBNB tokens) must be paid in order to join the surfbnb DAO on Discord/TG. (As we are so early stage we cap the memberships to 25 people max)

We can assume that a new user would not have any ETH to pay for gas fees. They would need to therefore buy some ETH in order to be able to pay for the transaction. For this, they can use one of the On-ramp providers such as [Wyre](https://www.sendwyre.com/), [Transak](https://transak.com/), [Ramp](https://instant.ramp.network/) or [Circle](https://www.circle.com/en/). 

Alternatively, it may be possible for the DAO to pay the transaction fee on behalf of new users (preferable to reduce onboarding friction).

In the plugin settings, we would need to define how many tokens to issue to a new user when they join the DAO. 

# 2/ SurfBnB Listing Voting 🎚

> Enable surfbnb DAO members to vote on which listings get published. Each new listing would stay in draft mode and be submitted as a “conviction voting proposal” using the Gardens/Company Template hosted on Aragon Connect. Once the proposal has passed, the post would then be set to “Public”.

For the content producers and viewers on the protocol, creating a blockchain-enabled social media system will facilitate tracking of the content, author, timestamp, viewership, comments, as well as votes/likes in a public record. How does it deal with content discovery? By only showing you content from ambassadors you follow, and contributors they also follow. If you are a new player following no one, it suggests ambassadors to follow from a list voted by the governance SBNB holders.

# 3/ Vote on an editorial proposal in the DAO 🎛

> A user should be able to vote on a proposal by the DAO directly from the [www.surfbnb.tv](http://www.surfbnb.tv)  page/post. The first step of this process is for the user to login using [Fortmatic](https://fortmatic.com/). If they are not already a member, they should instead be prompted to join the DAO.

Once they have logged in, they should then be able to cast their vote. There are 2 voting methods available, binary (yes/no) or conviction voting. In the case of the latter, we would simply look how many tokens the individual has in their wallet.

The user may not have enough ETH to pay for gas fees. They would need to therefore buy some ETH in order to be able to pay for the transaction. For this, they can use one of the On-ramp providers such as [Wyre](https://www.sendwyre.com/), [Transak](https://transak.com/), [Ramp](https://instant.ramp.network/) or [Circle](https://www.circle.com/en/).

Alternatively, it may be possible for the DAO to pay the transaction fee on behalf of new users (preferable to reduce onboarding friction).

# 4/ Pay with crypto 📡

> When a user purchases a product or service on the store, the funds will be automatically converted by on the on-ramping provider into crypto and deposited into the DAOs vault. (Agent+[Gnosis Safe](https://gnosis-safe.io/#mobile)?)

This should be built as a Shopify and WooCommerce extension.

A WordPress admin user should be able to define which payment gateway they want to use in WooCommerce. One of these options should be one of the following on-ramping providers ([Wyre](https://www.sendwyre.com/), [Transak](https://transak.com/), [Ramp](https://instant.ramp.network/) or [Circle](https://www.circle.com/en/)). Fav = Transak (add a vote to decide?)

Offer exclusive digital art for sale? (NFT's). Talk with 

Subscriptions payable to the DAO > Most articles are locked behind a paywall

Featured Listing Fees  > Money received goes to the DAO

# 5/ Tipping / Donate funds to the DAO 🖥

> A user should be able to donate funds to the surfbnb DAO through utilising one of the following on-ramping providers [Wyre](https://www.sendwyre.com/), [Transak](https://transak.com/), [Ramp](https://instant.ramp.network/) or [Circle](https://www.circle.com/en/).

The result should be that the default option to donate funds is credit or debit card. Should the user already have crypto in their wallet, they can also choose to donate using that. (Or directly from their wallet such as Metamask)

The donated funds will be automated deposited into the surfbnb DAOs vault. 

We take the upvote/like button and turn it into a token transfer. 

Burn SBNB tokens to send donations to #OneTreePlanted #OneTreePerBooking

All tips received are automatically sent to the DAO. If the reader is paying in fiat, the funds are automatically converted to xDai and then sent to the DAO.

# 6/ Allow website visitors to claim token rewards

> Enable a token to be emailed if they complete a specific task (such as verifying their email address). This can be accomplished using [Linkdrop](https://linkdrop.io/). The beauty of Linkdrop is that it enables any user to claim digital assets (such as a token) without having a wallet in advance.

**Plugin settings:** Specify how many tokens to distribute to each user via Linkdrop.


# WParagon Opportunity 💡

We hope to be able to make these interactions possible without even leaving the WordPress page or post, through embeddable widgets built on top of [Aragon Connect](https://connect.aragon.org/). This was part of the [Hack for Freedom](https://hackforfreedom.org/) on Discord and was created by @Joey C !!! We have code/design ready for a brand new non-WP based site but we will stick with WP for now to explore this integration as it could be a Proof Of Concept for nearly half a billion sites today. The Aragon WordPress plugin will enable website visitors to seamlessly interact with an Aragon DAO directly from a WordPress website. 30% of the websites in the world use WP. Over 400 million people visit WordPress sites each month. 28% of all e-commerce goes through WooCommerce. Should we list it on https://gitcoin.co/bounties/funder
