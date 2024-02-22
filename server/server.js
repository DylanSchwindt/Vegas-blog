
const mongoose = require('mongoose');

const dotenv = require('dotenv');

dotenv.config({
    path: '../.env'
});

const {ApolloServer } = require('apollo-server-express');
const {typeDefs} = require('./schema/TypeDefs')
const {resolvers} = require('./schema/resolvers');

const app = require('./app')

const DB = process.env.DATABASE.replace(
    '<password>',
    process.env.DATABASE_PASSWORD
);

mongoose.connect(DB).then(() => console.log('DB connect on succesfully'))

const port = process.env.PORT || 3001;
let server;
const spinUpApolloServer = async () => {
	server = new ApolloServer({typeDefs, resolvers})

	await server.start();
	server.applyMiddleware({app})
}

spinUpApolloServer();

app.listen({port}, () =>{
    console.log("SERVER is running on Port ", port)
})

process.on('unhandledRejection', (err) => {
	console.log('UNCAUGHT REJECTION! Shutting down! ');
	console.log(err.name, err.message);
	server.close(() => {
		process.exit(1);
	});
});