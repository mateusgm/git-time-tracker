Installation
============

    git clone git://github.com/mateusgm/git-time-tracker.git
    cd git-time-tracker
    sudo ln -s `pwd`/commit-msg.php /usr/share/git-core/templates/hooks/commit-msg
    sudo ln -s `pwd`/git-time-tracker.php /usr/bin/git-tt

Usage
=====

Put the a time tag between brackets in every first commit after a break:

    git commit -a -m "[30m] this is a commit msg"
    git commit -a -m "[1hr] this is a commit msg"
    git commit -a -m "[2hrs] this is a commit msg"

To check how many hours the team have spent on the project:

    git tt 

To check the current hourly rate of the project:

    git tt <project-cost>
