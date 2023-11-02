### Modified Version of Underscore `_s` Boilerplate Theme

I registered the following JavaScript and CSS Vendor Libraries:

1. SplideJS - For Carousels for more info check docs `https://splidejs.com/`
2. Simui - Layout library that I created to simplify layouts, for more check documentation `https://sphahmbokazi.co.za/simuicode/`
3. FS Lightbox - This one is for lightbox and galleries for docs check `https://fslightbox.com/`

### Includes

I added includes to avoid bloating Functions.php, for more check functions.php, here is list of them:

1. inc/custom-blocks.php - for registering of custom blocks
2. inc/custom-post-types.php - for registering of all custom post types with their custom taxonomies
3. inc/customizer.php - for registering custom customizer options
5. inc/menus.php - for registerng site options
6. inc/ajax.php - for handling ajax

### Blocks Templates
I have added blocks folder in templates-part folder for rendering dynamic blocks.

### Basic starter Options and Customizer
For more check header.php and includes or clone seperately managed boilerplate `https://github.com/Khandasoftware/siphamandla.git`

### CSS
I added blocks folder in the SASS/CSS then added blocks folder in `./css` folder and then link all css files in css/index.css file using @import.

### JS
I Added `js/blocks` folder and import and initialize all public modules and initialize theme in `index.js` file.

### Build
Now `index.css` and `index.js` are the only files to be registered but the vendor files are enqueued seperately.

### CLI
Nothing changed, for more check `UNDERSCORE_README.md` file.

