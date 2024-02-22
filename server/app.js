
const express = require('express');

const cors = require('cors');
const path = require('path');

// Run instance
const app = express();

app.use(cors());


module.exports = app;