# CVLN

Website (static) for civilian.

## Prerequisites

Install [Node.js](http://nodejs.org/) on your local machine.

## Instructions for Development

### First Time
1. Navigate to the working directory of the site on your local machine on the command line (ex. `cd /Users/yourusername/sites/CVLN`)
2. Run `npm install` to install the various modules listed in `package.json`

### Every time

1. Run `gulp` to start the build/dev process\*. This automatically does the following (these tasks can be found in `gulpfile.js`):
  - Creates a local server at `localhost:3000` where the site can be previewed
  - 'Lints' the Sass (checks for proper syntax and outputs suggestions)
  - Converts Sass to CSS and compresses it
  - Outputs the new CSS file(s) in the `assets/dist/style` directory
  - 'Lints' the JS (checks for proper syntax and outputs suggestions)
  - Compresses all the JS together and outputs it in the `assets/dist/scripts` directory
  - Compresses all JPEGs and PNGs in the `assets/images` directory
  - Watches for changes on all of the above - will reload the page automatically
2. Make and review your changes
3. Quit the build process by pressing `Control + C`
4. Commit and push changes to the repository
5. Manually upload changes to the live server (hoping to automate this eventually)

\* The initial output of running `gulp` will look something like the following:

```
[12:10:22] Using gulpfile ~/sites/CVLN/gulpfile.js
[12:10:22] Starting 'scss-lint'...
[12:10:22] Starting 'sass'...
[12:10:22] Starting 'lint'...
[12:10:22] Starting 'minify'...
[12:10:22] Starting 'imagemin'...
[12:10:22] Starting 'browser-sync'...
[12:10:22] Finished 'browser-sync' after 51 ms
[BS] Local URL: http://localhost:3000
[BS] External URL: http://10.0.1.5:3000
[BS] Serving files from: ./
[BS] 1 file changed (style.css)
[12:10:23] Finished 'sass' after 556 ms
[12:10:23] Finished 'lint' after 558 ms
[12:10:23] Finished 'minify' after 1.26 s
[12:10:29] Finished 'scss-lint' after 7.14 s
[12:10:32] gulp-imagemin: Minified 77 images (saved 0 B - 0%)
[12:10:32] Finished 'imagemin' after 9.56 s
[12:10:32] Starting 'default'...
[12:10:32] Finished 'default' after 114 ms
```
