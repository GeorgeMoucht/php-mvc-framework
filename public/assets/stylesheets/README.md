# Main file - app.scss

The main file (app.scsss) should be the only Sass file from the whole project that not begining with an underscore. This file should not contain anything more that @import declarations and comments.

Instead of having too many imports in this file, every directory inside sass folder should contain an all.sass file. Each all.sass file should contain all the necessary imports for the current folder.