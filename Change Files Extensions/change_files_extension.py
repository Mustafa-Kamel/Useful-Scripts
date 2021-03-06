import sys
import glob
import os
import datetime

if (len(sys.argv) < 3):
    exit(
        'Missing parameters: you should enter the [from] and [to] extensions respectively!')

start_time = datetime.datetime.now()
arg1 = sys.argv[1].lower()
arg2 = sys.argv[2].lower()
change_from_extension = '.' + arg1
change_to_extension = '.' + arg2

extensions = ['ai', 'aif', 'aifc', 'aiff', 'asc', 'atom', 'atom', 'au', 'avi', 'bcpio', 'bin', 'bmp', 'cdf', 'cgm', 'class', 'cpio', 'cpt', 'csh', 'css', 'csv', 'dcr', 'dir', 'djv', 'djvu', 'dll', 'dmg', 'dms', 'doc', 'dtd', 'dvi', 'dxr', 'eps', 'etx', 'exe', 'ez', 'gif', 'gram', 'grxml', 'gtar', 'hdf', 'hqx', 'htm', 'html', 'ice', 'ico', 'ics', 'ief', 'ifb', 'iges', 'igs', 'jpe', 'jpeg', 'jpg', 'js', 'json', 'kar', 'latex', 'lha', 'lzh', 'm3u', 'man', 'mathml', 'me', 'mesh', 'mid', 'midi', 'mif', 'mov', 'movie', 'mp2', 'mp3', 'mp4', 'm4v', 'mpe', 'mpeg', 'mpg', 'mpga', 'ms', 'msh',
              'mxu', 'nc', 'oda', 'ogg', 'pbm', 'pdb', 'pdf', 'pgm', 'pgn', 'png', 'pnm', 'ppm', 'ppt', 'ps', 'qt', 'ra', 'ram', 'ras', 'rdf', 'rgb', 'rm', 'roff', 'rss', 'rtf', 'rtx', 'sgm', 'sgml', 'sh', 'shar', 'silo', 'sit', 'skd', 'skm', 'skp', 'skt', 'smi', 'smil', 'snd', 'so', 'spl', 'src', 'sv4cpio', 'sv4crc', 'svg', 'svgz', 'swf', 't', 'tar', 'tcl', 'tex', 'texi', 'texinfo', 'tif', 'tiff', 'tr', 'tsv', 'txt', 'ustar', 'vcd', 'vrml', 'vxml', 'wav', 'wbmp', 'wbxml', 'wml', 'wmlc', 'wmls', 'wmlsc', 'wrl', 'xbm', 'xht', 'xhtml', 'xls', 'xml', 'xpm', 'xsl', 'xslt', 'xul', 'xwd', 'xyz', 'zip']

if arg1 not in extensions:
    exit('Unknow extension ' + arg1)


if arg2 not in extensions:
    exit('Unknow extension ' + arg2)

for file in glob.glob('*' + change_from_extension):
    os.rename(file, os.path.splitext(file)[0] + change_to_extension)

print('time: ' + str(datetime.datetime.now()-start_time))
