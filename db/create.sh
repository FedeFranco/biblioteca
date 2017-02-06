#!/bin/sh

SCRIPT=$(readlink -f "$0")
DIR=$(dirname "$SCRIPT")
psql -U biblioteca biblioteca < $DIR/biblioteca.sql
