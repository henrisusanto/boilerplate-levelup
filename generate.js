
// node generate hierarchy.json
'use strict';

const fs = require('fs')
let stub = fs
    .readFileSync('stub.php', 'utf8')
    .split(`
`).join('\\n')
let app_map = fs
    .readFileSync(process.argv[2], `utf-8`)
    .split(`.php": {}`)
    .join(`.php": {"-content": "${stub}"}`)
app_map = JSON.parse(app_map)

generateFiles(app_map, () => {
    fillingFiles(app_map)
})

function generateFiles (jsonTree, cb)
{
    const jsondir = require('jsondir')
    jsondir.json2dir(jsonTree, (e) => {
        if (e) console.error(e)
        else cb && cb ()
    })
}

function fillingFiles (app_map)
{
    const glob = require('glob')
    let findRoot = Object.keys(app_map)[0]
    glob(`${findRoot}/**/*`, (e, result) => {
        if (e) console.error(e)
        else
        {
            for (var path of result)
            {
                if (path.indexOf('.php') > -1)
                {
                    let filename = path.split('/')
                    filename = filename[filename.length - 1]
                    let classname = filename.replace(`.php`, ``)
                    let namespace = path.replace(`/${filename}`, ``).split(`/`).join(`\\`)

                    let currentfilecontent = fs
                        .readFileSync(path, `utf-8`)
                        .replace('{{CLASSNAME}}', classname)
                        .replace('{{NAMESPACE}}', namespace)

                    fs.writeFileSync(path, currentfilecontent)
                }
            }
        }
    })    
}