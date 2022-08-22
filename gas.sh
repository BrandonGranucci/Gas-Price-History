#!/bin/bash
tagsoup_link="https://repo1.maven.org/maven2/org/ccil/cowan/tagsoup/tagsoup/1.2.1/tagsoup-1.2.1.jar"
gas_price_link="https://gasprices.aaa.com/state-gas-price-averages/"


if [ -f "tagsoup-1.2.1.jar" ]
then
	echo "Tagsoup Currently Installed"
else
	echo "Tagsoup Not Located...Installing"
	wget -O "tagsoup-1.2.1.jar" "$tagsoup_link" 
fi

while true
do
	wget -O gas_site.html "$gas_price_link"
	

	java -jar "tagsoup-1.2.1.jar" --files "gas_site.html"
	
	
	python3 "parser.py" "gas_site.xhtml"

	rm gas_site.html
	rm gas_site.xhtml
	rm regular.png
	rm premium.png
	rm diesel.png

	echo "PROGRAM MESSAGE: Database Updated"

	sleep 86400
done
