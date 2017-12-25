### Update project
cd {{ path }}
git checkout {{ branch }}
git fetch origin
git reset --hard {{ commit_id }}


