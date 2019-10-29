#!/bin/bash

git_name=`git config user.name`;
git_email=`git config user.email`;

# author name
read -p "Author name ($git_name): " author_name
author_name=${author_name:-$git_name}

# author email
read -p "Author email ($git_email): " author_email
author_email=${author_email:-$git_email}

# author username
username_guess=${author_name//[[:blank:]]/}
read -p "Author github username ($username_guess): " author_username
author_username=${author_username:-$username_guess}

# author website
author_website_guess="https:\/\/github.com\/${author_username}"
read -p "Author website ($author_website_guess): " author_website
author_website=${author_website:-$author_website_guess}

# vendor name
read -p "Vendor ($author_username): " vendor_name
vendor_name=${vendor_name:-$author_username}

# vendor github
read -p "Vendor github name ($vendor_name): " vendor_github
vendor_github=${vendor_github:-$vendor_name}

# package name
current_directory=`pwd`
current_directory=`basename $current_directory`
read -p "Package name ($current_directory): " package_name
package_name=${package_name:-$current_directory}

# package website
package_website_guess="https:\/\/github.com\/${vendor_github}\/${package_name}"
read -p "Package package_website ($package_website_guess): " package_website
package_website=${package_website:-$package_website_guess}

# package description
read -p "Package description: " package_description

# vendor psr-4
read -p "Vendor psr-4: " vendor_psr4

# package psr-4
read -p "Package psr-4: " package_psr4

echo
echo -e "Author: $author_name ($author_username, $author_email, $author_website)"
echo -e "Vendor: $vendor ($vendor_github)"
echo -e "Package: $package_name ($package_website) <$package_description>"
echo -e "psr-4 autoload: $vendor_psr4\\$package_psr4\\"

echo
echo "This script will replace the above values in all files in the project directory and reset the git repository."
read -p "Are you sure you wish to continue? (n/y) " -n 1 -r

echo
if [[ ! $REPLY =~ ^[Yy]$ ]]
then
    [[ "$0" = "$BASH_SOURCE" ]] && exit 1 || return 1
fi

# echo

# rm -rf .git
# git init

echo

find . -type f -exec sed -i '' -e "s/:author_name/${author_name}/"  {} \;
find . -type f -exec sed -i '' -e "s/:author_email/${author_email}/"  {} \;
find . -type f -exec sed -i '' -e "s/:author_username/${author_username}/"  {} \;
find . -type f -exec sed -i '' -e "s/:author_website/${author_website}/"  {} \;
find . -type f -exec sed -i '' -e "s/:vendor_name/${vendor_name}/"  {} \;
find . -type f -exec sed -i '' -e "s/:vendor_name_github/${vendor_github}/"  {} \;
find . -type f -exec sed -i '' -e "s/:package_name/${package_name}/"  {} \;
find . -type f -exec sed -i '' -e "s/:package_website/${package_website}/"  {} \;
find . -type f -exec sed -i '' -e "s/:package_description/${package_description}/"  {} \;
find . -type f -exec sed -i '' -e "s/:vendor_psr4/${vendor_psr4}/"  {} \;
find . -type f -exec sed -i '' -e "s/:package_psr4/${package_psr4}/"  {} \;

sed -i '' -e "/^\*\*Note:\*\* Replace/d" README.md

echo "Replaced all values and reset git directory, self destructing in 3... 2... 1..."

# rm -- "$0"
