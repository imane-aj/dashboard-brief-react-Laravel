import React, { Component } from 'react'

export class Get extends Component {
  render() {
    return (
        <div className="container">
        <div className="row justify-content-center">
          <div className="col-md-10">
            <div className="hero">
              <div className="btn">
                <a href="ajout.php"><i className="fa-regular fa-plus"></i> Promotion</a>
                <form className="d-flex" role="search">
                  <input type="search" placeholder="Search" name="input" aria-label="Search" id="search" />
                  <button type="submit" className='btnAbsolu'><i className="fa-brands fa-searchengin"></i></button>
                </form> 
              </div>
              <div className="show">
              <table className="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Pormotion</th>
                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody id="result">
                    <tr>
                      <td></td>
                      <td>
                        <a href=""><i className="fa-regular fa-pen-to-square"></i></a>
                        <a href=""><i className="fa-regular fa-trash-can"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    )
  }
}

export default Get