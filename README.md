## Step to run

- If you are using port `8080`/`8082`, change them in the docker-compose.yml
- If you **changed** the `8080`, **replace** all `8080` to the port you use in `db.sql`
- Run `docker-compose up -d`
- The db.sql is automatically imported for you!
- Browse http://localhost:8080/

You may change to use `wordpress` docker image just in case you do not trust the image I used for debugging

You may see lots of error popping up in your editor / IDE as I do not map the whole wordpress folder to local drive, thus the intellisense cannot find the Wordpress built-in function.

But they are too big to include to a repo and break part of the reason we use docker image I guess

## Credits:

Image: https://unsample.net/ , images_credits.json

The text inside posts are generated by https://randomwordgenerator.com/paragraph.php
