Rusmar Motel
=====

Base core product.

###Plugins Needed
*  Berkshelf
*  Omnibus

Install using:
*  vagrant plugin install vagrant-berkshelf
*  vagrant plugin install vagrant-omnibus

## Git Functions
* git branch = a list of local branches.
 * If "*" is next to the branch name, that is the branch you are working on.
* git status = Will show you a list of your local changes. Will only show files that you have edited to be different from the repo seen on BitBucket.
* git diff PATH/TO/MODIFIED/FILE = Change "PATH/TO/MODIFIED/FILE" to the actual file you would like to look at. The result of this command will be a listing of the changes you have made to a file. To get out of the diff view, simple press the "Q" key.
* git add PATH/TO/MODIFIED/FILE = Change "PATH/TO/MODIFIED/FILE" to the actual file you would like to add to the repo. The result of this will add the file to you LOCAL git. Every ADD requires a commit.
* git commit -m "Message about this add/commit." = Replace "Message about this add/commit." with you own message. The result here is now there is a full commit on your local git that is ready to be pushed to the repo.
 * Before thinking about a push, fetch and merge in the mainline repo.
* git fetch mainline = reaches out to the main repo and retreives the latest changes.
* There are 2 options that will merge the latest mainline into your current branch.
 * git merge mainline/master = Will merge the master branch into your local git.
 * git merge mainline/dev = Will merge the dev branch into your local git.
* Now the mainline should be merged in with your local commit. Do another "git status" to make sure you don't have to do a git add/commit again.
* git push origin BRANCH_NAME = Change BRANCH_NAME to the name of the branch you wish to push to your forked repo.


# CHANGELOG
=====
* 2014-4-10 - Put the site in a git repo. -MBC

