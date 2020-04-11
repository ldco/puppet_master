#!/bin/bash
grep -rli '#597884' * | xargs -i@ sed -i 's/#597884/#aebecb/g' @