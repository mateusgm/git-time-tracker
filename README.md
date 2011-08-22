Installation
============

    git clone git://github.com/mateusgm/git-time-tracker.git
    cd git-time-tracker
    sudo ln -s `pwd`/commit-msg.php /usr/share/git-core/templates/hooks/commit-msg
    sudo ln -s `pwd`/git-time-tracker.php /usr/bin/git-tt

Usage
=====

Put a time tag between brackets in every first commit after a time break: (these are the formats supported)

    git commit -a -m "[30m] this is a commit msg"
    git commit -a -m "[1hr] this is a commit msg"
    git commit -a -m "[2hrs] this is a commit msg"

When you commit without the tag, the app insert the tag automatically on the commit messages considering that you've worked continuously since the previous commit

To check how many hours the team have spent on the project:

    git tt 

To check the current hourly rate of the project:

    git tt <project-cost>
