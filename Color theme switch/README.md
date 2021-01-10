# Color Theme Switch
This script helps you add a color palette to a page or website for the user to use it to alter the page style theme.

**Note** that you should have multiple stylesheet files, one for each theme.

## How it works?
What happens is that we have a color palette which appears on clicking an icon e.g. font-awesome icon, the color palette has multiple color boxes inside it, each one corresponds to a different theme, and the default stylesheet changes upon clicking those boxes, i.e when you click the red box which has a data-value equals red the stylesheet href value changes to assets/css/style-red.css and so on,   	you may has your styles in a different place so you should just change the path in the link-tag above and in the js inside the colorSel.click() function