#!/bin/bash

set -o errexit -o nounset
if [ "$TRAVIS_BRANCH" != "master" ]
then
  echo "This commit was made against the $TRAVIS_BRANCH and not the master! No deploy!"
  exit 0
fi

rev=$(git rev-parse --short HEAD)

cd /data/www/masterlab_site/

git config user.name "sven"
git config user.email "12164238@qq.com"
git  pull origin master