# amplify
Twig filter for the Craft CMS to optimize rich text content for Google AMP

**To Install

Drag the amplify directory into the plugins folder of your Craft installation. Navigate to your plugins settings and install Amplify. 

**Features

The plugin uses a Twig filter to run through the AMP filter settings. To add this to your template, you will need to apply the filter like so: {{ entry.body|amplify|raw }}. 

By default, this plugin will find and replace image, video, and audio tags with their Google AMP counterparts. The plugin also strips non AMP approved tags from the copy and adds layout="responsive" to amp images to enable responsive image layouts. 


