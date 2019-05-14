import React, { Component } from 'react';

class Home extends Component {
  
  constructor(props) {
    super(props);
    this.state = {
      items : []
    };
  }

  componentDidMount() {
    fetch("https://randomuser.me/api/?results=5")
      .then(res => res.json())
      .then(parsedJSON => parsedJSON.results.map(data => (
        {
          firstName: `${data.name.first}` ,
          lastName: `${data.name.last}` ,
          location: `${data.location.state}, ${data.nat}` ,
          image: `${data.picture.large}` ,

        }
      )))
      .then(items => this.setState({
        items,
        isLoaded: false
      }))
      .catch(error => console.log('parsing failed', error))
  }

  render() {
    const {items} = this.state;
    return (
      <div className="boxWhite">
        {
          items.length > 0 ? items.map(item => {
            const {firstName, lastName, location, image} = item;
            return(
              <div>
                <center><img src={image} alt={firstName} className="circle"/>
                </center><br/>
                <div className="ctr">
                  {firstName} {lastName}<br/>
                  {location}
                </div>
              </div>
            );
          }) : null
        }
      </div>
    );
  }
}

export default Home;