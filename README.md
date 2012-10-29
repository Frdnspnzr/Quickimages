# Quickimage
## Howdy!
Hey, looks like you want some images. Well, that's awesome.

Quickimage was made to solve a problem I had myself. I really like sites like ragefac.es, but I'm not allways happy with the images provided. So I put together a site myself with one thing in mind: Simplicity. I didn't want complicated admin interfaces and stuff like that, I just wanted to upload images, make them searchable and link to them.

After that worked I dumped it all, made everything worse with an object oriented design and an API, put a config file there and BOOOOOM, here's some awesome thing you can use yourself! Have fun.

You have no idea what this is about? Here's an example page: [images.frdnspnzr.de](http://images.frdnspnzr.de/)

## Install
Installing Quickimage is easy: Create a new web-accessible directory. Copy all the files to this directory. Edit config.php as needed (You *must* change siteURL. You *should* change siteName. You *may* have a look at the rest). Create a subdirectory called "images" and fill it as you wish. Done.
## Usage
This guide just covers standard configuration with "DefaultFileSystem"-Iterator. If you use custom plugins please see their documentation.
### Adding images
Quickimages uses a file-based system for tagging your images. You don't have to use this, but I strictly recommend it. It's the magic that will make your images searchable. Don't worry, it's not hard. You just have to follow some naming conventions.

In general, every image in your image directory will be listed, so adding images is as easy as uploading images. Apparently, it *is* uploading images. I repeat: **Every** supported image in your image directory will be shown publicly. Keep that in mind when uploading stuff.
### Naming conventions
You can leave your image names as they are. Quickimage will function properly, but you may experience some weird stuff when searching for images (best case is it won't work at all). If you want to make your images searchable you will have to tag them in the file name.

File names are list_of_tags.extension, for example patrick_eating.gif or neil_patrick_harris_doctor_horrible.png. Every word in the filename can be searched. In our example searching for "eating" would show the first image, "harris" the second image, "patrick" both images and "potato" none.
### Custom configuration
If you like to you can dive into configuration a bit deeper. Every standard flag in config.php is documented pretty well, so you will know what you can do. You can add new flags as you wish, some plugins may even need it. However, please do not delete any flag. Horrible things are going to happen.
## Developer
So, you want to develop a plugin, eh? Maybe this database-focused image iteratore I tried to avoid? Or an ultra-fast new image loader (please, send me a pull request)? No problem. There are three things changeable via configuration: The image iterator, the name obfuscator and the image loader. All have at least one default implementation you can use as a pattern.
### Basics
If you want to write your own plugin you have to put them  in the corresponding folder in /lib, "iterators", "loader" or "obfuscators". There are no strict naming conventions, but you should consider two things:

- The class you're going to implement has to have the same name as the file. That's case sensitive.
- This name's also going to be the name of your plugin you'll have to put in the config. That's case sensitive, too!

### Image iterator
The image iterator is the heart of Quickimages. It's the source of the images. Also, it's pretty easy to implement. Just inherit ImageIterator and implement the protected method getAllImages(). The method should return a simple array containing an element for every image. A single element consists of the following properties:

- name: Image filename without extension (for example "patrick_eating")
- extension: Image extension (for example "gif")
- directory: Image path (for example "./images/")
- path: Complete path to image (for example "./images/patrick_eating.gif"")
- keywords: An array of the keywords the search function should match (for example "patrick,eating,spongebob")
- filename: Complete filename (for example "patrick_eating.gif")

That's it! The standard image iterator will handle everything else for you.

### Name Obfuscator
The name obfuscator is the little thing that makes the links look awesome. It's even easier to implement then the image iterator! You have to inerhit NameObfuscator and implement the two public methods obfuscate($filename) and unobfuscate($filename). The first is passed the clear text image filename (for example "patrick_eating.gif") and should return the obfuscated filename (for example "c4e2fe4b39bd2ae5668e90755f5bfd11"). The second method is the other way: It get's an obfuscated filename and returns the clear text name. Done.

### Image Loader
WIP. Sorry. I don't know why anyone should need a custom image loader :) If you really really want to, see standard loader for API.