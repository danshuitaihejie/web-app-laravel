const fs = require('fs')
let cssHash
let cssVendorHash
let jsHash
let jsVendorHash

try {
    const data = fs.readFileSync('sequence-viewer/dist/index.html', 'utf8')
    const cssRegex = /app\.[\w\d]{8}\.css/
    const cssVendorRegex = /vendors\.[\w\d]{8}\.css/
    const jsRegex = /app\.[\w\d]{8}\.js/
    const jsVendorRegex = /vendors\.[\w\d]{8}\.js/
    cssHash = cssRegex.exec(data)[0]
    cssVendorHash = cssVendorRegex.exec(data)[0]
    jsHash = jsRegex.exec(data)[0]
    jsVendorHash = jsVendorRegex.exec(data)[0]
} catch (err) {
    console.error(err)
}

try {
    let data = fs.readFileSync('resources/views/diagrams/show.blade.php', 'utf8')
    data = data.replace(/app\.[\w\d]{8}\.css/g, cssHash)
    data = data.replace(/vendors\.[\w\d]{8}\.css/g, cssVendorHash)
    data = data.replace(/app\.[\w\d]{8}\.js/g, jsHash)
    data = data.replace(/vendors\.[\w\d]{8}\.js/g, jsVendorHash)
    fs.writeFileSync('resources/views/diagrams/show.blade.php', data)
} catch (err) {
    console.error(err)
}

console.log(`CSS hash: ${cssHash}`)
console.log(`CSS vendor hash: ${cssVendorHash}`)
console.log(`JS hash: ${jsHash}`)
console.log(`JS vendor hash: ${jsVendorHash}`)
console.log('✨ All hashes have been updated from sequence-viewer/dist/index.html to resources/views/diagrams/show.blade.php.')
