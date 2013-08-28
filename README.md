# WikibaseMobile Extension

Author - [Pragun Bhutani](http://pragunbhutani.in)

This extension contains the mobile skin created for Wikidata as my Google Summer of Code 2013 project,
[Mobilize Wikidata](http://www.mediawiki.org/wiki/User:Pragunbhutani/GSoC_2013_Proposal).

## Instructions

##### NOTE : The purpose of this extension is to provide mobile functionality on Wikidata and may not support all Wikibase installations.

#### Dependancies :
- Wikibase
- Mobile Frontend

#### To Install :
First make sure that you have the MobileFrontend extension installed.
Once you're sure of that, clone the extension into the 'extensions directory of your Wikibase installation'.

```
cd extensions/
git clone https://github.com/pragunbhutani/WikibaseMobile.git
```

After the repo has been cloned into your extensions directory, add the following to your `localSettings.php`:

```php
require_once( "$IP/extensions/WikibaseMobile/WikibaseMobile.php" );
```

NOTE : The line mentioned above must be added AFTER `require_once "$IP/extensions/MobileFrontend/MobileFrontend.php";`

And that should do it!
