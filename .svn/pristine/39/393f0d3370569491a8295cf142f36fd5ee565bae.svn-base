/**
 * SHA-1 hash function
 */
function sha1(input) {
    // 32-bit left rotate
    function leftRotate(n, b) {
        return (n << b) | (n >>> (32 - b));
    }

    // Convert string to UTF-8
    function utf8Encode(str) {
        var utf8 = '';
        for (var n = 0; n < str.length; n++) {
            var c = str.charCodeAt(n);
            if (c < 128) {
                utf8 += String.fromCharCode(c);
            } else if ((c > 127) && (c < 2048)) {
                utf8 += String.fromCharCode((c >> 6) | 192);
                utf8 += String.fromCharCode((c & 63) | 128);
            } else {
                utf8 += String.fromCharCode((c >> 12) | 224);
                utf8 += String.fromCharCode(((c >> 6) & 63) | 128);
                utf8 += String.fromCharCode((c & 63) | 128);
            }
        }
        return utf8;
    }

    var message = utf8Encode(input);
    var bytes = [];
    for (var i = 0; i < message.length; i++) {
        bytes.push(message.charCodeAt(i));
    }

    // Pre-processing
    var msgLen = bytes.length * 8;
    bytes.push(0x80);
    while ((bytes.length * 8) % 512 !== 448) {
        bytes.push(0x00);
    }
    for (var i = 0; i < 8; i++) {
        bytes.push((msgLen >>> (56 - i * 8)) & 0xFF);
    }

    // Process message in 512-bit chunks
    var h0 = 0x67452301;
    var h1 = 0xEFCDAB89;
    var h2 = 0x98BADCFE;
    var h3 = 0x10325476;
    var h4 = 0xC3D2E1F0;

    for (var chunk = 0; chunk < bytes.length / 64; chunk++) {
        var w = [];
        for (var i = 0; i < 16; i++) {
            var offset = chunk * 64 + i * 4;
            w[i] = (bytes[offset] << 24) | 
                   (bytes[offset + 1] << 16) | 
                   (bytes[offset + 2] << 8) | 
                   bytes[offset + 3];
        }
        for (var i = 16; i < 80; i++) {
            w[i] = leftRotate(w[i - 3] ^ w[i - 8] ^ w[i - 14] ^ w[i - 16], 1);
        }

        var a = h0;
        var b = h1;
        var c = h2;
        var d = h3;
        var e = h4;

        for (var i = 0; i < 80; i++) {
            var f, k;
            if (i < 20) {
                f = (b & c) | ((~b) & d);
                k = 0x5A827999;
            } else if (i < 40) {
                f = b ^ c ^ d;
                k = 0x6ED9EBA1;
            } else if (i < 60) {
                f = (b & c) | (b & d) | (c & d);
                k = 0x8F1BBCDC;
            } else {
                f = b ^ c ^ d;
                k = 0xCA62C1D6;
            }

            var temp = (leftRotate(a, 5) + f + e + k + w[i]) & 0xFFFFFFFF;
            e = d;
            d = c;
            c = leftRotate(b, 30);
            b = a;
            a = temp;
        }

        h0 = (h0 + a) & 0xFFFFFFFF;
        h1 = (h1 + b) & 0xFFFFFFFF;
        h2 = (h2 + c) & 0xFFFFFFFF;
        h3 = (h3 + d) & 0xFFFFFFFF;
        h4 = (h4 + e) & 0xFFFFFFFF;
    }

    // Convert to hex
    function toHex(n) {
        var hex = '';
        for (var i = 7; i >= 0; i--) {
            hex += ((n >>> (i * 4)) & 0xF).toString(16);
        }
        return hex;
    }

    return toHex(h0) + toHex(h1) + toHex(h2) + toHex(h3) + toHex(h4);
}