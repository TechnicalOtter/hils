# Notice about Agents.MD
This project explicity rejects the use of AI agents to assist with or directly write any source code for this project. The use of them are forbidden in this project; if you are found to be using one, you will be removed from this project and barred permanently.

We are using the [No Agents](https://codeberg.org/rossabaker/no-agents.md) agents files to tell these unconsential bots to go do one.

That is why you see an `AGENTS.MD` file and `CLAUDE.md` file. Fuck them. They are made by assholes for assholes.

Now for why you are here...

# HILS
Welcome to HILS - The "Home [Intergrated Library System](https://en.wikipedia.org/wiki/Integrated_library_system)".

This is an attempt to create an ILS that is suitable for the home.

## Rationale
I have tried various ILS systems at home, most notably Koha and Evergreen because I have a lot of books. While there are other options for the home market such as Libib or LibraryThing, they're dependent on someone's infra or cost a lot. Plus they don't handle multiple people that well.

I wanted something simple to use but that would support some more "advanced" features such as basic circulation (I often lend books to friends and keeping track of them is hard!) and shelf locations so that things can be found with ease.

Hence, HILS was born.

## Important Information
I am **not** a professional programmer, nor am I security professional. I am a PhD student/hobbyist. Therefore I can **guarantee** that there will be security issues or faults in my code. This project is **not intended to be on the public internet** and is only designed to be used within a closed, local network. I have taken some basic measures in security (e.g. I do use things like `password_hash` and `password_verify`) but I am offering zero, zlich, nada in the way of any guarantees on security.

If you are someone who actually has security credentials, please feel free to commit changes that actually improve the situation.

## Why Bootstrap 3 and JQuery
The last time I wrote any sort of major project (back in secondary school), BS3 and JQuery were current and it's what I know. Is it old? Yes. Is it a bit crusty? Yes. But this is something of a personal exercise in nostalgia too. I wanted something familiar and fun.

Sorry if it angers someone or a designer somewhere. I can't even do [programmer art](https://en.wikipedia.org/wiki/Programmer_art).

## Who
Hi! I'm Ela/TechncalOtter. I like to make silly things. You can see more of what I do on [Mastodon](https://glammr.us/@technicalotter) or on my [website](https://technicalotter.github.io).

## Want to help?
Please! Do help! Create a fork on your account, do some work on a new branch and open an issue so I can pull it back in. I would love for help!

I'm running the dev server by pulling up a console and using the `php` command like this: `php -S 127.0.0.1:8000` within the `/html/` directory.

## AI
No AI has been used in the creation of this. If you want to contribute, while I can't stop you from using AI to help you, I will hold you responsible for any code you submit. Mistakes or other nonsense that arises from AI will be blamed on you, not the AI.
