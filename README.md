# Legacy features for FSE

Welcome to the Legacy features for FSE repository on GitHub. Here you can browse the source, discuss/open issues and keep track of the development.

If you are not a developer, we recommend to [download legacy features for FSE](https://wordpress.org/plugins/legacy-features-for-fse/) from WordPress directory.

**Todo** Change the link if we change the name of the plugin before publishing on WordPress directory.

## [What this plugin is for](#legacy-features-for-fse-plugin)

Currently this plugin adds the legacy widgets block in any kind of block editor, more specifically the Full Site Editor(FSE) introduced in WordPress 5.9.

By reintroducing the legacy widgets block, you can use some of the legacy widgets as `Navigation Menu` for example.

However with blocks theme, like Twenty Twenty-Two, you can't update menus anymore because this kind of theme doesn't support menus.

This is why this plugin reintroduces the WordPress admin menus to be able to manage menus you want to use with the legacy widgets block.

This also allows to use external plugins legacy widgets which might not have already been converted to blocks.

## [Pre-requisites](#pre-requisites)

Before starting, make sure that you have the following software installed and working on your computer:

1. A local [WordPress](https://wordpress.org/support/article/how-to-install-wordpress/) (5.9 or later) instance
2. [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git) to clone the Legacy features for FSE repository (or your fork of the Legacy features for FSE repository).
3. [Node.js](https://nodejs.org/en/download/) which provides [NPM](https://docs.npmjs.com/). They are both required by [Webpack](https://webpack.js.org/guides/getting-started/) that Legacy features for FSE uses to build and minify CSS and javascript files. We recommend to install Node.js LTS version.
4. [Composer](https://getcomposer.org/doc/00-intro.md) because Legacy features for FSE uses its autoloader to work and it is required to install development tools such as PHP CodeSniffer that ensures your code follows coding standards.

## [How to set up Legacy features for FSE](#how-to-setup-legacy-features-for-fse)

The simplest way is to clone locally this repository and build it directly in your local WordPress instance by following the steps below:

1. Go to your local WordPress instance wp-content/plugins/ folder:<br/>
`cd your/local/wordpress/path/wp-content/plugins`
2. Clone there the Legacy features for FSE repository (or your fork) from GitHub:<br/>
`git clone https://github.com/polylang/legacy-features-for-fse.git`
3. Go to your local legacy-features-for-fse clone folder from there: `cd legacy-features-for-fse`
4. Run the composer command: `composer build`
5. Activate Legacy features for FSE as if you had installed it from WordPress.org:<br/>

**Note**: we recommend Windows users to use `Git Bash` provided with [Git for Windows](https://git-scm.com/download/win) instead of the command or powershell terminals.
